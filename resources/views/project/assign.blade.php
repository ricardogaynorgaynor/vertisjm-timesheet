@extends('layouts.app')

@section('content')



<div class="row" style="width:100%;margin:0 auto;">

       <div class="col-md-8">
        <h3 style="text-align:center;">{{ $projectinfo->project_name }}</h3>
       </div>

   

        <div class="col-md-12" style="">
            <div class="c-table-responsive@desktop" style="">
            <table class="c-table">
    
                <caption class="c-table__title">
                    Employees <small>{{ sizeof($employees) }} </small>
                    
                    <a class="c-table__title-action" href="#!">
                        <i class="fa fa-cloud-download"></i>
                    </a>
                </caption>
    
                <thead class="c-table__head c-table__head--slim">
                    <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head"></th>
                      <th class="c-table__cell c-table__cell--head">Employee Name</th>
                      <th class="c-table__cell c-table__cell--head">Email</th>
                      <th class="c-table__cell c-table__cell--head">Department</th>
                      <th class="c-table__cell c-table__cell--head">Type</th>
                      <th class="c-table__cell c-table__cell--head">Projects</th>
                      <th class="c-table__cell c-table__cell--head">
                          Actions
                      </th>
                    </tr>
                </thead>
    
                <tbody>
    
                    @foreach($employees as $employee)
                    <tr class="c-table__row c-table__row">


                    <td class="c-table__cell">
                            <div class="o-media">
                                <div class="o-media__img u-mr-xsmall">
                                    <div class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="{{ asset('images/'.$employee->user->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </td>

                        
                    <td class="c-table__cell">{{ $employee->user->name }}</td>
                    <td class="c-table__cell">{{ $employee->user->email }}</td>
                    <td class="c-table__cell">{{ $employee->employee_department }}</td>
                    <td class="c-table__cell">{{ $employee->employee_type }}</td>
                    <td class="c-table__cell">{{ sizeof($employee->projects)." projects" }}
                    </td>
   
                        <td class="">
                        <a href="{{ route('assign-to-employee', ['project_id' => $projectinfo->project_id, 'employee_id' => $employee->employee_id]) }}">
                            
                                <?php

                                $isAssigned = App\project_team::where('project_team_project_id', '=', $project_info->project_id)
                                                        ->where('project_employee_user_id', '=', $employee->employee_id)
                                                        ->get()->first();

                                if(!empty($isAssigned)){
                                    ?><button class="btn btn-danger">Remove</button><?php
                                }else{
                                    ?><button class="btn btn-default">Add</button><?php
                                }
                                ?>

                            


                            </a>  
                            <a href="{{ route('assign-project', ['project_id' => $employee->employee_id]) }}">
                                <button class="btn btn-default">View</button>
                                </a>                     
                        </td>
    
                        
                    </tr>
                    @endforeach
    
                </tbody>
    
            </table>
            </div>
        </div>
    </div>



@endsection