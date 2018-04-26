@extends('layouts.app')

@section('content')


<div class="col-md-12">

        <div class="col-xl-8" style="margin:0 auto;">
                <div class="c-card u-p-medium u-mb-medium">

                    <div class="u-text-center">
                        <div class="c-avatar c-avatar--large u-mb-small u-inline-flex">
                        <img class="c-avatar__img" src="{{ asset('images/'.$client->client_image) }}" alt="Adam's Face">
                        </div>

                        <h3 class="u-h5">{{ $client->client_name }}</h3>
                        <p>Compay: {{ $client->client_company }}</p>
                        <p>Email: {{ $client->client_email }}</p>
                        <p>Home phone: {{ $client->client_home_telephone }}</p>
                        <p>Work phone: {{ $client->client_work_telephone }}</p>
                        <p>Mobile phone: {{ $client->client_mobile }}</p>

                        <br><hr><br>

                        <h4>Address: </h4>
                        <p>Country: {{ $client->address->country }}</p>
                    <p>Address line 1: {{ $client->address->address_line_1 }}</p>
                    <p>Address line 2: {{ $client->address->address_line_2 }}</p>
                    <p>Zip code: {{ $client->address->address_zip_code }}</p>
                      
                    </div>

                    <div class="u-flex u-mt-medium">
                        <a class="c-btn c-btn--info c-btn--fullwidth u-mr-xsmall" href="#">Email</a>
                        <a class="c-btn c-btn--secondary c-btn--fullwidth" href="{{ route('client.profile.edit', ['id' => $client->client_id]) }}">Edit profile</a>
                    </div>
                    <br>
 


                    <div class="c-feed has-icons u-mt-medium" style="height:auto;padding-bottom:20px;">
                        <h2>Client Projects: </h2>

                        @foreach($client->projects as $project)
                        <div class="c-feed__item has-icon">
                            <i class="c-feed__item-icon u-bg-info fa fa-sticky-note"></i>
                            <h5><b><a href="{{ route('project.view.byid', ['project_id' => $project->project_id]) }}">{{$project->project_name }}</a></b></h5>
                            
                            <?php $tasks = \App\task::where('task_project_id', '=', $project->project_id)
                                                ->where('task_project_id', '=', $project->project_id)
                                                ->orderBy('task_id', 'desc')
                                                ->limit(2)
                                                ->get(); ?>
                            <div style="margin-left:10px;">
                            @foreach($tasks as $task)
                            <p style="width:auto;" class="u-text-mute u-text-uppercase u-text-small u-mb-xsmall c-tooltip c-tooltip--bottom" aria-label="{{ Carbon\Carbon::parse($task->created_at)->toDayDateTimeString() }}"><?php
                             echo $date = Carbon\Carbon::parse($task->created_at)->diffForHumans();
                             
                             ?></p>

                           
                                <div class="c-feed__item c-feed__item--fancy"> 
                                    <p class="c-feed__comment">{{ $task->task_name }}</p>
                                    <?php $employee = \App\employee::find($task->task_employee_id); ?>
                                    <span class="c-feed__meta">Done by taken:
                                            <a href="{{ route('employee.getEmployeeProfile', ['employee_id' => $employee->employee_id]) }}">
                                                {{$employee->user->name }}</a></span>
                                            <br><p>Time spent: {{ $task->time_taken }} ({{ $task->task_start_date." - ".$task->task_end_date }})</p>
                                </div>
                           
                  
                            @endforeach
                            </div>
                        </div>
                        @endforeach

                    </ul>

                   
                      
                            
                           

                     
                    </div>

                   
                </div>


</div>


@endsection
