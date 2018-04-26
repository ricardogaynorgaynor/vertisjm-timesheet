<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;

use Carbon\Carbon;

use App\User;
use App\project_team;
use App\employee;
use App\task;
use App\approval;


use Session;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $project_id)
    {
        $this->middleware('auth');

        $this->validate($request, [
            'taskname' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'datetime' => 'date',
            'time_taken' => 'required'
        ]);

        //return "wqeqwe";

        $task = new task();
        $task->task_employee_id = employee::where('employee_user_id', '=', Auth::user()->id)->first()->employee_id;
        $task->task_project_id = $project_id;
        $task->task_name = $request->taskname;
        $task->task_start_date = $request->startdate;
        $task->task_end_date = $request->enddate;
        $task->datetime = $this->getCreatedAtAttribute($request->datetime);
        $task->time_taken = $request->time_taken;
        $task->task_comment = $request->comment;
        $task->save();
        Session::flash('success', 'Task was added successfully!');
        return redirect()->back();

        
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
        //
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

    public function approve($task_id){
        $this->middleware('auth');

        if(Auth::user()->u_type == "man"){

        $task = task::find($task_id);
            if(!empty($task)){

                $apprroval = new approval();
                $apprroval->approval_task_id = $task_id;
                $apprroval->approval_approve_by_id = Auth::user()->id;
                $apprroval->save();
                Session::flash('success', 'Task was approved successfully');
                return redirect()->back();    
            }

        }else{

            //unauthorise access
        }
    }
}
