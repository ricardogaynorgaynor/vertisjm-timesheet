<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Session;

use App\User;
use App\employee;
use App\project_team;
use App\project;

use App\manager;

use Notification;

use Auth;

use App\Notifications\EmployeeAddedNotification;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employee::orderBy('created_at', 'desc')->paginate(4);          
        return view('employee.view-employee', ['employees' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('employee.add-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->middleware('auth');

        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'employeetype' => 'required',
            'image' => 'image',            
        ]);

        $secret = "password";
        $password = $secret;// str_shuffle($secret);
        
        
        $employee = new employee();
        $user = new user();

        $image = $request->image;
        if(!empty($image)){
            $file_new_name = time().$image->getClientOriginalName();
            $image->move('images/', $file_new_name);
            $user->image = $file_new_name;
        }else{
            $user->image = "profile.png";
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->u_type = "emp";
        $user->save();

        $lastId = DB::table('users')->orderBy('id', 'DESC')->first();

        $lastIdManager = manager::where('manager_user_id', '=', Auth::user()->id)->first();

        $employee->employee_user_id = $lastId->id;
        $employee->employee_added_by_id = $lastIdManager->manager_id;
        $employee->employee_department = $request->department;
        $employee->employee_type = $request->employeetype;

        if($employee->save()){

        $emp = User::where('email', '=', $request->email)->first();

       // $emp->notify(new EmployeeAddedNotification($emp));
      //  Notification::send($emp, new \App\Notifications\EmployeeAddedNotification());
    
            Session::flash('success', 'Employee was added successfully!');
    
            return redirect()->back();

        }

       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $employee = employee::where('employee_user_id', '=', Auth::user()->id)->first();
        return view('employee.edit-profile', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->middleware('auth');

        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'image' => 'image'        
        ]);

    
        $user = user::find(Auth::user()->id);

        $image = $request->image;
        if(!empty($image)){
            $file_new_name = time().$image->getClientOriginalName();
            $image->move('images/', $file_new_name);
            $user->image = $file_new_name;
        }else{
         //   $user->image = "profile.png";
        }


        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != null){
            $user->password = bcrypt($request->password);
        }
        $user->save();

            Session::flash('success', 'Employee was added successfully!');
            return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        Session::flash('success', 'Employee was deleted successfully');
        return redirect()->back();
    }

    public function isEmployeeAlreadyAssigned($project_id, $employee_id){

        return project_team::where('project_employee_user_id', '=', $employee_id)
                            ->where('project_team_project_id', '=', $project_id)
                            ->get()->first();

    }

    public function assign($project_id){

            $employee = employee::all();
            $project = project::find($project_id);
            $projectInfo = project::find($project_id);
           
        return view('project.assign', ['employees' => $employee, 'projectinfo' => $project, 'project_info' => $projectInfo]);
    }

    public function assignProject($project_id, $employee_id){
        
        $project = project::find($project_id);
        $employee = employee::find($employee_id);
        if (!empty($project) && !empty($employee) ){

            
            if(empty($this->isEmployeeAlreadyAssigned($project_id, $employee_id))){

                $projectObj = new project_team();
                $projectObj->project_employee_user_id = $employee_id;
                $projectObj->project_team_project_id = $project_id;
                $projectObj->project_manager_user_id = manager::where('manager_user_id', '=', Auth::user()->id)->first()->manager_id;
                $projectObj->save();
                Session::flash('success', 'Employee was added to project successfully!');
                return redirect()->back();

            }else{

            $deleted = project_team::where('project_employee_user_id', '=', $employee_id)
                                    ->where('project_team_project_id', '=', $project_id)
                                    ->delete();

                Session::flash('success', 'Employee was remobed from project successfully!');
                return redirect()->back();

            }
            
            
        }else{
            Session::flash('error', 'Error assigning employee to project. Please try again later');
            return redirect()->back();
        }

    }

    public function getEmployeeProfile($employee_id){


        $employeeExist = employee::find($employee_id);
        if(!empty( $employeeExist))
        $userExist = user::find($employeeExist->employee_user_id);
     
         if(Auth::user()->u_type == "emp" ){

             if($employeeExist->employee_user_id != Auth::user()->id)

                return view('error.error', ['error' => 'Access denied. You can acess this page']);
         }

        $ProjectController = new ProjectController();
        $employeeProjects = $ProjectController->getAllProjectAssignedToEmployeeHelperMethod($employee_id);

        $employee = employee::where('employee_id', '=', $employee_id)
                            ->join('users as u', 'employees.employee_user_id', '=', 'u.id')
                            ->get()->first();
        return !empty($employee) ? view('employee.employee-profile', ['employee' => $employee, 'projects' => $employeeProjects]) : view('error.error', ['error' => "Employee Profile Not found"]);

    }


}
