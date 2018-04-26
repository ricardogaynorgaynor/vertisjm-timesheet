<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\project;

use Auth;

use App\manager;
use App\employee;
use App\user;

use App\project_team;

use Carbon\Carbon;

use App\client;
use App\task;
use Session;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $project =  project::where('project_id', '<>', 0)
                            ->join('managers as m', 'projects.project_created_by_id', '=', 'm.manager_id') 
                            ->join('clients as c', 'projects.project_client_id', '=', 'c.client_id')
                            ->join('users as u', 'm.manager_user_id', '=', 'u.id')
                            ->orderBy('projects.created_at', 'desc')->paginate(6);

        return view('project.view-project', ['allprojects' => $project, 'allclients' => client::all()]);
    }

    public function getCreatedAtAttribute($date)
        {
            return Carbon::parse($date);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:255',
            'deadline' => 'date',
            'client' => 'required|numeric'
        ]);

       
        $manager = new manager();
        $managerinfo = $manager::where('manager_user_id', '=', Auth::user()->id)->first();
        $managerId = $managerinfo->manager_id;

        $project = new project();
        $project->project_name = $request->name;
        $project->project_client_id = $request->client;
        $project->deadline = $this->getCreatedAtAttribute($request->deadline);
       // return $this->getCreatedAtAttribute($request->deadline);
        $project->project_created_by_id = $managerId;
        $project->save();

        if( $request->has('checkbox') ){
            $projectID = project::orderBy('created_at', 'desc')->first();
            return redirect()->route('assign-project', ['project_id' => $projectID->project_id]);
        }


        Session::flash('success', 'Project Was created successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function getAllTaskAndEmployees($project_id){

        return project::where('project_id', '=', $project_id)
                                ->join('tasks as t', 't.task_project_id', '=', 'projects.project_id')
                                ->join('employees as emp', 'emp.employee_id', '=', 't.task_employee_id')
                                ->join('users as u', 'u.id', '=', 'emp.employee_user_id')
                                ->leftJoin('approvals as ap', 't.task_id', '=', 'ap.approval_task_id')
                                ->orderBy('t.task_id', 'DESC')
                                ->get();
     }


    public function show($project_id)
    {
        $tasks = $this->getAllTaskAndEmployees($project_id);
        $project = project::find($project_id)->first();

        return !empty($project) ? view('project.show-project-by-id', ['tasks' => $tasks, 'project' => $project]) : view('error', ['error' => "Project not found"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:255',
            'deadline' => 'date',
            'client' => 'required|numeric'
        ]);



       
        $manager = new manager();
        $managerinfo = $manager::where('manager_user_id', '=', Auth::user()->id)->first();
        $managerId = $managerinfo->manager_id;

        $project = project::find($id);
        $project->project_name = $request->name;
        $project->project_client_id = $request->client;
        $project->deadline = $this->getCreatedAtAttribute($request->deadline);
        $project->project_created_by_id = $managerId;
        $project->save();

        if( $request->has('checkbox') ){
            return redirect()->route('assign-project', ['project_id' => $id]);
        }


        Session::flash('success', 'Project Was updated successfully');
        return redirect()->back();
    }

    public function updateView($project_id){
        $allclients = client::all();
        $project = project::find($project_id);
        if(empty($allclients)){
            return view('error.error', ['error' => 'No clients yet. Please add a client first']);
        }
        return !empty($project) ?  view('project.edit-project', ['allclients' => $allclients, 'project' => $project] ) : view('error.error', ['error' => 'Project Not found']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    

    public function getAllProjectAssignedToEmployeeHelperMethod($empId){
        
        $project = project_team::where('project_employee_user_id', '=', $empId)
                                ->join('projects', 'projects.project_id', '=', 'project_teams.project_team_project_id')
                                ->join('clients', 'clients.client_id', '=', 'projects.project_client_id')
                                ->join('addresses as ad', 'ad.address_user_id', '=', 'clients.client_id')
                                ->get();

        return $project;
    }

    public function getAllProjectTeamByProjectId($empId, $project_id){
        
        $project = project_team::where('project_employee_user_id', '=', $empId)
                                ->where('projects.project_id', '=', $project_id)
                                ->join('projects', 'projects.project_id', '=', 'project_teams.project_team_project_id')
                                ->join('clients', 'clients.client_id', '=', 'projects.project_client_id')
                                ->join('addresses as ad', 'ad.address_user_id', '=', 'clients.client_id')
                                ->get()->first();

        return $project;
    }

    public function getAllProjectAssignedToEmployee($project_id = null)
    {
        $this->middleware('auth');

        if(Auth::user()->u_type == "emp"){

            $empId = employee::where('employee_user_id', '=', Auth::user()->id)->first()->employee_id;
                
            $projectsOn = $this->getAllProjectAssignedToEmployeeHelperMethod($empId);

            if($project_id == null && !empty($projectsOn)){

                $projectSingle = $projectsOn->first(); // return !empty($projectsOn) ? view('home', ['allprojects' => $projectsOn]) : view('employee.noprojecst');

            }else if(!empty($projectsOn)){

                $projectSingle = $this->getAllProjectTeamByProjectId($empId, $project_id);

            }else{

                return "Could not find project";

            }

            return !empty($projectsOn) && !empty($projectSingle) ? view('home', ['allprojects' => $projectsOn, 'projectSingle' => $projectSingle]) : view('employee.noprojects'); 

        }else if(Auth::user()->u_type == "man"){


            return view('manager.home-dashboard', ['projects' => project::all(), 'employees' => employee::all(), 'tasks' => task::all(), 'clients' => client::all()]);

        }

      
    }


    
}
