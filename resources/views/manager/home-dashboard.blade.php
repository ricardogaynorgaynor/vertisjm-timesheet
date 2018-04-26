@extends('layouts.app')

@section('content')


    <div class="col-md-12" style="width:100%;">
        <div class="col-sm-6 col-lg-3">
            <div class="c-state">
                <h3 class="c-state__title">Projects</h3><br>
                <h4 class="c-state__number">{{ count($projects) }}</h4>
                <p class="c-state__status c-tooltip c-tooltip--top" aria-label="Last project created">
                    
                    @if(count($projects) > 0)
                    {{ Carbon\Carbon::parse($projects[count($projects) - 1]->created_at)->diffForHumans() }}
                    @endif

                </p>
                <span class="c-state__indicator">
                    <i class="fa fa-arrow-circle-o-down"></i>
                </span>
            </div><!-- // c-state -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="c-state c-state--success">
                <h3 class="c-state__title">Employees</h3><br>
                <h4 class="c-state__number">{{ count($employees) }}</h4>
                <p class="c-state__status c-tooltip c-tooltip--top" aria-label="Last Employee created">
                    
                        @if(count($employees) > 0)
                        {{ Carbon\Carbon::parse($employees[count($employees) - 1]->created_at)->diffForHumans() }}
                        @endif


                </p>
                <span class="c-state__indicator">
                    <i class="fa fa-arrow-circle-o-up"></i>
                </span>
            </div><!-- // c-state -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="c-state c-state--warning">
                <h3 class="c-state__title">Clients</h3><br>
                <h4 class="c-state__number">{{ count($clients) }}</h4>
                <p class="c-state__status c-tooltip c-tooltip--top" aria-label="Last Client created">
                    
                        @if(count($clients) > 0)
                        {{ Carbon\Carbon::parse($clients[count($clients) - 1]->created_at)->diffForHumans() }}
                        @endif


                </p>
                <span class="c-state__indicator">
                    <i class="fa fa-arrow-circle-o-down"></i>
                </span>
            </div><!-- // c-state -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="c-state c-state--danger">
                <h3 class="c-state__title">Task</h3><br>
                <h4 class="c-state__number">{{ count($tasks) }}</h4>
                <p class="c-state__status c-tooltip c-tooltip--top" aria-label="Last Task created">

                        @if(count($tasks) > 0)
                        {{ Carbon\Carbon::parse($tasks[count($tasks) - 1]->created_at)->diffForHumans() }}
                        @endif

                </p>
                <span class="c-state__indicator">
                    <i class="fa fa-arrow-circle-o-up"></i>
                </span>
            </div><!-- // c-state -->
        </div>

    </div>




@endsection

