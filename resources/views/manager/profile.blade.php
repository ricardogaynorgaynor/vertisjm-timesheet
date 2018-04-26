@extends('layouts.app')

@section('content')
<div class="col-md-12">

        <div class="col-xl-8" style="margin:0 auto;">
                <div class="c-card u-p-medium u-mb-medium">

                    <div class="u-text-center">
                        <div class="c-avatar c-avatar--large u-mb-small u-inline-flex">
                        <img class="c-avatar__img" src="{{ asset('images/'.$user->image) }}" alt="Adam's Face">
                        </div>

                        <h3 class="u-h5">{{ $user->name }}</h3>
                        <span class="u-text-mute u-text-small">{{ $user->email }}</span>
                    </div>

                    <div class="u-flex u-mt-medium">
                       @if(Auth::user()->id == $user->manager_user_id)
                        <a class="c-btn c-btn--secondary c-btn--fullwidth" href="{{ route('manager.edit') }}" >Edit profile</a>
                        @endif
                    </div>
                    <br>

                    <h3>Projects added: </h3>

                    <div class="c-feed has-icons u-mt-medium" style="height:auto;padding-bottom:20px;">

                        <ul class="list-group">
                            @foreach($user->project as $project)
                                <li class="list-group-item"> <a href="{{ route('project.view.byid', ['project_id' => $project->project_id]) }}">{{ $project->project_name }}</a></li>
                            @endforeach
                        </ul>

                     
                    </div>

                   
                </div>

</div>

@endsection
