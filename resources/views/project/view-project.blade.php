@extends('layouts.app')

@section('content')

<div class="c-toolbar u-mb-medium col-md-12" style="margin-top:-30px;">

    <div class="c-btn-group u-mr-medium u-hidden-down@tablet">
        <a class="c-btn c-btn--secondary" href="#!">
            <i class="fa fa-check-download u-opacity-medium"></i>
            Export Csv
        </a>
    </div>

 

   
<a data-toggle="modal" data-target="#createproject" class="c-btn c-btn--info u-ml-auto u-hidden-down@mobile" href="{{ route('client.addnew') }}">
        <i class="fa fa-plus u-mr-xsmall u-opacity-medium"></i>New Project
    </a>

</div>



<!-- Modal -->
<div class="c-modal modal fade" id="createproject" tabindex="-1" role="dialog" aria-labelledby="modal2">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">
                <div class="c-modal__header">
                    <h3 class="c-modal__title">Enter Project Details</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
              
                <div class="c-modal__body">


                    <form class="c-card__body" method="POST" action="{{ route('project.add') }}" enctype="multipart/form-data">
                            {{ csrf_field() }} 
            
                    
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="input1">Project name</label> 
                        <input class="c-input" name="name" value="" type="text" placeholder="" required> 
                    </div>
            
                    <div class="c-field u-mb-small">
                            <label class="c-field__label" for="input1">Deadline (optional)</label> 
                            <input class="c-input" data-toggle="datepicker" dateformat="yy-dd-mm" name="deadline" id="input-calendar" type="text" name="deadline">
                    </div>
            
                    <div class="c-field u-mb-medium">
                            <label class="c-field__label" for="select3">Single a client (Optional)</label>
                            <select class="c-input" required name="client">
                                <option selected disabled>Choose</option>
                                @foreach($allclients as $client)

                                    <option value="{{ $client->client_id }}">{{$client->client_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="c-choice c-choice--checkbox">
                                <input class="c-choice__input" id="checkbox" name="checkbox" type="checkbox">
                                <label class="c-choice__label" name="checkbox"  for="checkbox">Add team after saving</label>
                            </div>


                    <br>



                        <button class="c-btn c-btn--info " type="submit" name="submit">Save Project</button>

                </form>
                  


                </div>
                <div class="c-modal__footer">
                    
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->



    <div class="row" style="width:100%;margin:0 auto;">
            <div class="col-md-12" style="">
                <div class="c-table-responsive@desktop" style="">
                <table class="c-table">
        
                    <caption class="c-table__title">
                        Projects <small>{{ sizeof($allprojects) }} </small>
                        
                        <a class="c-table__title-action" href="#!">
                            <i class="fa fa-cloud-download"></i>
                        </a>
                    </caption>
        
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                          <th class="c-table__cell c-table__cell--head">Project Name</th>
                          <th class="c-table__cell c-table__cell--head">Client Name</th>
                          <th class="c-table__cell c-table__cell--head">Created by</th>
                          <th class="c-table__cell c-table__cell--head">Project Team</th>
                          <th class="c-table__cell c-table__cell--head">Deadline</th>
                          <th class="c-table__cell c-table__cell--head">
                              Actions
                          </th>
                        </tr>
                    </thead>
        
                    <tbody>
        
                        @foreach($allprojects as $project)
                        <tr class="c-table__row c-table__row">
        
                            
        
                        <td class="c-table__cell"><a href="{{ route('project.view.byid', ['project_id' => $project->project_id]) }}">{{ $project->project_name }}</a></td>
                        <td class="c-table__cell"><a href="{{ route('client.profile', ['id' => $client->client_id]) }}">{{ $project->client_name }}</a></td>
                        <td class="c-table__cell">{{ $project->name }}</td>
                        <td class="c-table__cell"><?php $prTeam = \App\project_team::where('project_team_project_id', '=', $project->project_id)
                                                                                    ->join('employees as e', 'e.employee_id', '=', 'project_teams.project_employee_user_id')
                                                                                    ->join('users as u', 'u.id', '=', 'e.employee_user_id')
                                                                                    ->limit(3)
                                                                                    ->get(); ?>
                                <div class="c-project__team">
                                        {{ count($prTeam) }}
                                    @foreach($prTeam as $prteam)
                                        <a class="c-project__profile c-tooltip c-tooltip--top" aria-label="{{ $prteam->name }}" href="{{ route('employee.getEmployeeProfile', ['employee_id' => $prteam->employee_id]) }}">
                                            <img src="{{ asset('images/'.$prteam->image)}}" alt="Adam's Face">
                                        </a>
                                    @endforeach

                                        <a class="c-project__profile c-project__profile--btn c-tooltip c-tooltip--top" aria-label="Add more team members" href="{{ route('assign-project', ['project_id' => $project->project_id]) }}">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                </div>
                        
                        
                        </td>
                        

                        
                        <td class="c-table__cell">{{  Carbon\Carbon::parse($project->deadline)->diffForHumans() }}</td>


                            
        
                            <td class="">
                            <a href="{{ route('assign-project', ['project_id' => $project->project_id]) }}">
                                <button class="btn btn-default">Add team</button>
                                </a>
                                
                                <a href="{{ route('edit.project', ['project_id' => $project->project_id]) }}">
                                <button class="btn btn-default">Edit</button>
                                </a>
                                <button class="btn btn-default">Delete</button>
                            
                            </td>
        
                        
                            
                        </tr>
                        @endforeach
        
                    </tbody>
        
                </table>

            <center>{{ $allprojects->links() }}</center>

           


                </div>
            </div>
        </div>

    
        

    



@endsection