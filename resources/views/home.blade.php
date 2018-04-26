@extends('layouts.app')

@section('content')

<?php

?>
<div class="container-fluid">
    <div class="row">

<div class="c-toolbar u-mb-medium col-md-12" style="margin-top:-30px;">

    <div class="col-md-5">

        <?php if(!empty($projectSingle) ){ ?>
               Active Project: <?php echo $projectSingle->project_name ?>
        <?php }else { ?>
            No projects
        <?php } ?>


    </div>
    
        
 
    <div class="col-md-7">
        <div class="c-field">
            <select class="c-input" id="projectFilter">
                <option value="{{ $projectSingle->project_id }}" selected disabled>{{ $projectSingle->project_name }}</option>
                @foreach($allprojects as $project)
                    @if ($project->project_id != $projectSingle->project_id)
                        <option value="{{ $project->project_id }}">{{ $project->client_name." (".$project->project_name.")" }}</option>
                    @endif
                @endforeach
            </select>
        </div>

    </div>

    
    </div>



           

        <div class="col-md-10 c-card u-mb-medium" style="padding:20px;margin:0 auto;">

                <div class="row">
                        <div class="col-lg-2 u-text-center">
                            <div class="c-avatar c-avatar--xlarge u-inline-block">
                            <img class="c-avatar__img" src="{{ asset('images/'.$projectSingle->client_image) }}" alt="Avatar">
                            </div>

                          
                        </div>
                        <div class="col-lg-5">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">Name</label> 
                            <h3>{{ $projectSingle->client_name }}</h3>
                            </div>

                            <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">Address</label> 
                                   <h5>{{ $projectSingle->address_line_1 }}</h5>
                                </div>

                            

                        </div>
                </div><br><br><hr><br>

                @if(count($errors) > 0)
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

            <form method="post" action="{{ route('task.submit', ['project_id' => $projectSingle->project_id]) }}">
                    {{ csrf_field() }} 

            <table class="table">

                  

                <thead>
                    <th>Date</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Time Spent</th>
                </thead>

                <tr>
                    <td>
                            <input class="c-input" data-toggle="datepicker" dateformat="yy-dd-mm" name="datetime" id="input-calendar" type="text" >
                    </td>
                    <td>
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="startdate" name="startdate" type="text" class="c-input" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>

                    </td>

                    <td>
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="enddate" name="enddate" type="text" class="c-input" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </td>
                 
                    <td>
                            <input class="c-input time" name="time_taken"  id="totaltime" type="text" placeholder="" readonly >
                    </td>
                </tr>

            </table>

            

            <div class="col-md-6">

                    <div class="c-field u-mb-small">
                            <label class="c-field__label" for="bio">Task</label>
                            <textarea class="c-input" id="task" name="taskname" cols="" rows="5"></textarea>
                        </div>

            </div>


            <div class="col-md-6">

                    <div class="c-field u-mb-small">
                            <label class="c-field__label" for="bio">Comment</label>
                            <textarea class="c-input" name="comment" id="comment" rows="5"></textarea>
                        </div>


            </div>

           

            <div class="col-md-12">
            <button class="c-btn c-btn--info" type="submit" id="submit" name="submit" disabled>Subit Task</button>
            </div>

                </form>

            
        </div>
    </div>
</div>

<script>

$( "#projectFilter" ).change(function() {
    var projectId = $('#projectFilter').val();
    var deletePostUri = "{{ route('home.route') }}";
    window.location = deletePostUri+"/" + projectId;
});

</script>

<script type="text/javascript">

     var startDef = $('#startdate').val("00:00");
     var endDef = $('#enddate').val("00:00");
     var ehour = 0;
     var eminute = 0;
     var shour = 0;
     var sminute = 0;

    $('#startdate').timepicker({
        showMeridian:false
    });
    $('#enddate').timepicker({
        showMeridian:false
    });

    $('#startdate').timepicker().on('changeTime.timepicker', function(e,w) {
        shour =  e.time.hours;
        sminute = e.time.minutes;
       
        $('#totaltime').val(calculateTime(shour, sminute, ehour, eminute));

    });

     $('#enddate').timepicker().on('changeTime.timepicker', function(e) {
        ehour =  e.time.hours;
        eminute = e.time.minutes;
         $('#totaltime').val(calculateTime(shour, sminute, ehour, eminute));

    });

    function calculateTime(shour, sminute, ehour, eminute){
        var hourCal = ehour - shour;
        var minuteCal = eminute - sminute;
        if(sminute > eminute){
            minuteCal = 60 - sminute;
        }else{
            minuteCal = eminute - sminute;
        }
        if(sminute > eminute){
            hourCal = hourCal - 1;
        }
        if(minuteCal == 0)
            minuteCal = "00";

            if(hourCal < 0 || (hourCal < 1 && minuteCal < 1) ){
                $('#submit').prop('disabled', true);
            }else{
                $('#submit').prop('disabled', false);
            }

        return hourCal + ":" + minuteCal;

    }




</script>


@endsection
