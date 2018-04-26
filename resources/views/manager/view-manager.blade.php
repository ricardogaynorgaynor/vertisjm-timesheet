@extends('layouts.app')

@section('content')

<div class="c-toolbar u-mb-medium col-md-12" style="margin-top:-30px;">


</div>


<div class="row" style="width:100%;margin:0 auto;">
        <div class="col-md-12" style="">
            <div class="c-table-responsive@desktop" style="">
            <table class="c-table">
    
                <caption class="c-table__title">
                    Managers <small>{{ sizeof($managers) }} </small>
                    
                    <a class="c-table__title-action" href="#!">
                        <i class="fa fa-cloud-download"></i>
                    </a>
                </caption>
    
                <thead class="c-table__head c-table__head--slim">
                    <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head"></th>
                      <th class="c-table__cell c-table__cell--head">Manager Name</th>
                      <th class="c-table__cell c-table__cell--head">Email</th>
                      <th class="c-table__cell c-table__cell--head">Department</th>
                      <th class="c-table__cell c-table__cell--head">Projects</th>
                      <th class="c-table__cell c-table__cell--head">
                            Action
                        </th>
                    </tr>
                </thead>
    
                <tbody>
    
                    @foreach($managers as $manager)
                    <tr class="c-table__row c-table__row">


                    <td class="c-table__cell">
                            <div class="o-media">
                                <div class="o-media__img u-mr-xsmall">
                                    <div class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="{{ asset('images/'.$manager->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </td>

                        
                    <td class="c-table__cell">{{ $manager->name }}</td>
                    <td class="c-table__cell">{{ $manager->email }}</td>
                    <td class="c-table__cell">{{ $manager->department }}</td>

                    <td class="c-table__cell">

                        {{ sizeof(\App\project::where('project_created_by_id', '=', $manager->manager_id)->get()) }}

                    </td>

                    <td class="">
                    <a href="{{ route('manager.profile', ['id' => $manager->id]) }}">
                        <button class="btn btn-default">View</button></a
                    </td>
   
                        
    
                        
                    </tr>
                    @endforeach
    
                </tbody>
    
            </table>

           <center> {{ $managers->links() }} </center>
            </div>
        </div>
    </div>




    
        

    



@endsection