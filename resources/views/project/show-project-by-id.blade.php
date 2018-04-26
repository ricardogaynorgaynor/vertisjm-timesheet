@extends('layouts.app')

@section('content')


<div class="col-md-8 c-card u-p-medium u-mb-medium" style="margin:0 auto;" >


        <center><h2>{{ $project->project_name }}<h2></center>
        
        <h4>Tasks: {{ count($tasks) }}</h4>
        @foreach($tasks as $task)
        <p class="u-text-mute u-text-uppercase u-text-small u-mb-xsmall c-tooltip c-tooltip--bottom" aria-label="{{ Carbon\Carbon::parse($task->created_at)->toDayDateTimeString() }}"><?php
            echo $date = Carbon\Carbon::parse($task->created_at)->diffForHumans();
            
            ?></p>

        
            <div class="c-feed__item c-feed__item--fancy" style="padding-left:10px;">
                <p class="c-feed__comment">{{ $task->task_name }}</p>

            <span class="c-feed__meta">Submitted by:<a href="{{ route('employee.getEmployeeProfile', ['employee_id' => $task->employee_id]) }}"> {{ $task->name }} </a></span>
            <br>
            <p class="c-tooltip c-tooltip--bottom" aria-label="{{ Carbon\Carbon::parse($task->date_time)->toDayDateTimeString() }}">Time spent: {{ $task->time_taken }} ({{ $task->task_start_date." - ".$task->task_end_date }})</p>
            <br>
            <span class="c-feed__meta">Approval Status: 
                <?php
                if($task->approval_task_id != null){ ?>
                <div class="c-candidate__status u-color-success">
                    <i class="fa fa-check u-mr-xsmall"></i>Approved {{  Carbon\Carbon::parse($task->created_at)->diffForHumans() }}
                </div>
                <?php }else{ ?>
                Pending 
                <a href="{{ route('task.approve', ['task_id' => $task->task_id] ) }}">
                <button class="c-btn c-btn--info c-btn--small">Click to approve</button>
                </a>
                <?php } ?>
            </span>
        </div>
        

        @endforeach



</div>


@endsection
