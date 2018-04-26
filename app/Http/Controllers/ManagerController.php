<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\User;

use Auth;

use App\manager;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::where('u_type', '=', 'man')
                    ->leftJoin('managers as m', 'users.id', '=', 'm.manager_user_id')
                    ->orderBy('users.id', 'desc')->paginate(6);
        return view('manager.view-manager', ['managers' =>  $user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = manager::where('manager_user_id', '=', $id)
                            ->join('users as u', 'u.id', '=', 'managers.manager_user_id')
                            ->get()->first();

        return !empty($manager) ? view('manager.profile', ['user' => $manager]) : view('error.error', ['error' => "Manager profile not found"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $manager = manager::where('manager_user_id', '=', Auth::user()->id)->first();
        return view('manager.edit-manager', ['manager' => $manager]);
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
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image'
        ]);
        $id = Auth::user()->id;
        $user = user::find($id);
        $image = $request->image;
        if(!empty($image)){
            $file_new_name = time().$image->getClientOriginalName();
            $image->move('images/', $file_new_name);
            $user->image = $file_new_name;
        }else{
          //  $user->image = "profile.png";
        }

        if($request->password != null){
            $user->password = bcrypt($request->password);
        }

        $user->email = $request->email;
        $user->name = $request->name;
        if($user->save()){
            if($request->department != null){
                $manager = manager::where('manager_user_id', '=', $id)->first();
                if(empty($manager)){
                    $managerInsert = new manager();
                    $managerInsert->manager_user_id = $id;
                    $managerInsert->department = $request->department;
                    $managerInsert->save();
                }else{
                    $managerUpdate = manager::find($manager->manager_id);
                    $managerUpdate->department = $request->department;
                    $managerUpdate->save();
                }
                
            }
           Session::flash('success', 'Manager profile was update successfully!');
        }else{
            Session::flash('error', 'Unable to update manager profile');
        }
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
        //
    }
}
