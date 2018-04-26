@extends('layouts.app')

@section('content')
<?php
$taskcountApproval = 0;
$taskcount = 0;
$taskinsight = 0;
?>

<div class="col-md-12">

        <div class="col-xl-8" style="margin:0 auto;">
                <div class="c-card u-p-medium u-mb-medium">

                    <div class="u-text-center">
                        <div class="c-avatar c-avatar--large u-mb-small u-inline-flex">
                        <img class="c-avatar__img" src="{{ asset('images/'.$employee->image) }}" alt="Adam's Face">
                        </div>

                        <h3 class="u-h5">{{ $employee->name }}</h3>
                        <p>{{ $employee->employee_type }}</p>
                        <span class="u-text-mute u-text-small">{{ $employee->email }}</span>
                    </div>

                    <div class="u-flex u-mt-medium">
                        <a class="c-btn c-btn--info c-btn--fullwidth u-mr-xsmall" href="#">Email</a>
                        <a class="c-btn c-btn--secondary c-btn--fullwidth" href="#">Edit profile</a>
                    </div>
                    <br>


                    <table class="c-table u-border-right-zero u-border-left-zero">
                        <thead>
                                <th class="u-pt-small u-color-primary">{{ sizeof($projects) }}</th>
                                <th class="u-pt-small u-color-primary" id="task"></th>
                                <th class="u-pt-small u-color-primary" id="approval"></th>
                                <th class="u-pt-small u-color-primary" id="taskinsight"></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="u-text-mute u-text-xsmall u-pb-small u-text-uppercase">Projects</td>
                                <td class="u-text-mute u-text-xsmall u-pb-small u-text-uppercase">Total Task</td>
                                <td class="u-text-mute u-text-xsmall u-pb-small u-text-uppercase">Approved Task</td>
                                <td class="u-text-mute u-text-xsmall u-pb-small u-text-uppercase">Task isnight</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="c-feed has-icons u-mt-medium" style="height:auto;padding-bottom:20px;">


                        @foreach($projects as $project)
                        <div class="c-feed__item has-icon">
                            <i class="c-feed__item-icon u-bg-info fa fa-sticky-note"></i>

                            <h5>
                                @if(Auth::user()->u_type =="man")
                                <a href="{{ route('project.view.byid', ['project_id' => $project->project_id]) }}">
                                <b>{{$project->project_name}}</b>
                                </a>
                                @else
                                <b>{{$project->project_name}}</b>
                                @endif
                            </h5>
                            
                            <?php $tasks = \App\task::where('task_employee_id', '=', $employee->employee_id)
                                                ->where('task_project_id', '=', $project->project_id)
                                                ->leftJoin('approvals as a', 'tasks.task_id', '=', 'a.approval_task_id')
                                                ->orderBy('task_id', 'desc')
                                                ->get();
                                                 ?>
                            <div style="margin-left:10px;">
                            @foreach($tasks as $task)
                            <p class="u-text-mute u-text-uppercase u-text-small u-mb-xsmall c-tooltip c-tooltip--bottom" aria-label="{{ Carbon\Carbon::parse($task->created_at)->toDayDateTimeString() }}"><?php
                             echo $date = Carbon\Carbon::parse($task->created_at)->diffForHumans();
                             
                             ?></p>

                           
                                <div class="c-feed__item c-feed__item--fancy">
                                    <p class="c-feed__comment">{{ $task->task_name }}</p>

                                    <p>Time spent: {{ $task->time_taken }} ({{ $task->task_start_date." - ".$task->task_end_date }})</p>
                                        <br>
                                    <?php
                                    if($task->approval_task_id != null){  $taskcountApproval++;  ?>
                                    <div class="c-candidate__status u-color-success">
                                        <i class="fa fa-check u-mr-xsmall"></i>Approved {{  Carbon\Carbon::parse($task->created_at)->diffForHumans() }}
                                    </div>
                                    <?php }else{ ?>
                                    Approval Status: Pending
                                    @if(Auth::user()->u_type == "man") 
                                    <a href="{{ route('task.approve', ['task_id' => $task->task_id] ) }}">
                                    <button class="c-btn c-btn--info c-btn--small">Click to approve</button>
                                    @endif
                                    </a>
                                    <?php } ?>

                                </div>
                           
                            <?php $taskcount++ ?>
                            @endforeach
                            </div>
                        </div>
                        @endforeach

                        <?php
                        if($taskcount != 0){
                            $percentage = ($taskcountApproval / $taskcount) * 100;
				        $taskinsight =  round($percentage, 0, PHP_ROUND_HALF_UP); //round up number//

                        }else{
                            $taskinsight = 0;
                        }
                        
                        ?>

                    </ul>

                   
                      
                            
                           

                     
                    </div>

                   
                </div>


</div>
<script>
$('#approval').text(<?php echo $taskcountApproval; ?>);
$('#task').text(<?php echo $taskcount; ?>);
$('#taskinsight').text(<?php echo $taskinsight; ?> + " % approved");

</script>
@endsection
