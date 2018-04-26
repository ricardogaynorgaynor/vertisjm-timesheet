@extends('layouts.app')

@section('content')

<div class="c-toolbar u-mb-medium col-md-12" style="margin-top:-30px;">

    <div class="c-btn-group u-mr-medium u-hidden-down@tablet">
        <a class="c-btn c-btn--secondary" href="#!">
            <i class="fa fa-check-download u-opacity-medium"></i>
            Export Csv
        </a>
        <a class="c-btn c-btn--secondary" href="#!">
            <i class="fa fa-envelope u-opacity-medium"></i>
            Email All
        </a>
    </div>

 

   
<a class="c-btn c-btn--info u-ml-auto u-hidden-down@mobile" href="{{ route('client.addnew') }}">
        <i class="fa fa-plus u-mr-xsmall u-opacity-medium"></i>New Client
    </a>

</div>




<div class="row" style="width:100%;margin:0 auto;">
    <div class="col-md-12" style="">
        <div class="c-table-responsive@desktop" style="">
        <table class="c-table">

            <caption class="c-table__title">
                Clients <small>{{ sizeof($allclients) }} </small>
                
                <a class="c-table__title-action" href="#!">
                    <i class="fa fa-cloud-download"></i>
                </a>
            </caption>

            <thead class="c-table__head c-table__head--slim">
                <tr class="c-table__row">
                  <th class="c-table__cell c-table__cell--head"></th>
                  <th class="c-table__cell c-table__cell--head">Name</th>
                  <th class="c-table__cell c-table__cell--head">email</th>
                  <th class="c-table__cell c-table__cell--head">Country</th>
                  <th class="c-table__cell c-table__cell--head">Projects</th>
                  <th class="c-table__cell c-table__cell--head">
                      Actions
                  </th>
                </tr>
            </thead>

            <tbody>

                @foreach($allclients as $client)
                <tr class="c-table__row c-table__row">

                    <td class="c-table__cell">
                        <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                                <div class="c-avatar c-avatar--xsmall">
                                <img class="c-avatar__img" src="{{ asset('images/'.$client->client_image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </td>
 
                <td class="c-table__cell">{{ $client->client_name }}</td>
                    <td class="c-table__cell">{{ $client->client_email }}</td>
                    <td class="c-table__cell">{{ $client->address->country }}</td>
                    <td class="c-table__cell">{{ sizeof($client->projects)." Projects" }}
                        @foreach($client->projects as $project)
                            <small class="u-block u-text-mute"><a href="{{ route('project.view.byid', ['project_id' => $project->project_id]) }}">{{ $project->project_name }}</a></small>
                        @endforeach
                    </td>

                    <td class="">
                    <a href="{{ route('client.profile', ['id' => $client->client_id]) }}">
                            <button class="btn btn-default">View</button>
                    </a>
                    <a href="{{ route('client.profile.edit', ['id' => $client->client_id]) }}">
                        <button class="btn btn-default">Edit</button>
                    </a>
                        <button class="btn btn-default">Delete</button>
                    
                    </td>

                
                    
                </tr>
                @endforeach

            </tbody>

        </table>

        <center> {{ $allclients->links() }} </center>

        </div>
    </div>
</div>
    



@endsection