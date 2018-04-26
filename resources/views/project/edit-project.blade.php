@extends('layouts.app')

@section('content')



<div class="row" style="width:100%;margin:0 auto;">
        <div class="col-md-12" style="">

                @if(count($errors) > 0)
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif


            <form class="c-card__body" method="POST" action="{{ route('edit.project.post', ['id' => $project->project_id]) }}" >
                    {{ csrf_field() }} 
    
            
            <div class="c-field u-mb-small">
                <label class="c-field__label" for="input1">Project name</label> 
            <input class="c-input" name="name" value="{{ $project->project_name }}" type="text" placeholder="" required> 
            </div>
    
            <div class="c-field u-mb-small">
                    <label class="c-field__label" for="input1">Deadline (optional) previous date: {{ Carbon\Carbon::parse($project->deadline)->toDateString() }}</label> 
            <input class="c-input" value="" data-toggle="datepicker" dateformat="yy-dd-mm" name="deadline" id="input-calendar" type="text" name="deadline">
            </div>
    
            <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="select3">Single a client (Optional)</label>
                    <select class="c-input" required name="client">
                        <option value="{{ $project->project_client_id }}" selected >{{ $project->clientInfo->client_name }}</option>
                        @foreach($allclients as $client)
                            @if( $project->project_client_id != $client->client_id)
                            <option value="{{ $client->client_id }}">{{$client->client_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="c-choice c-choice--checkbox">
                        <input class="c-choice__input" id="checkbox" name="checkbox" type="checkbox">
                        <label class="c-choice__label" name="checkbox"  for="checkbox">Add team after editing</label>
                    </div>


            <br>



                <button class="c-btn c-btn--info " type="submit" name="submit">Save Project</button>

        </form>
                  
        
            </div>
        </div>

    
        

    



@endsection