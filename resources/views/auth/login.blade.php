@extends('layouts.nonavbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-5 " style="margin:0 auto;float:none;">
            <div class="login-form" style="margin-top:130px;"> 
                <center>
                    <img class="c-sidebar__brand-img" src="{{ asset('images/logo.png') }}" alt="Logo"> 
                </center>
                <hr>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           

                            <div class="col-md-12">
                                <label class="input_label">Login in with your e-mail address</label>
                                <input id="email" type="email" class="form-control login-inputs" name="email" value="{{ old('email') }}" required autocomplete="false">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                            <div class="col-md-12">
                                    <label class="input_label">Login in with your password</label>
                                <input id="password" type="password" class="form-control login-inputs" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div><br>
                                <button type="submit" class="btn btn-primary login-btn main-color" >
                                    Login
                                </button>

                            </div>
                        </div>

                        
                    </form>

                <a href="{{ url('/register') }}">
                    <button type="button" class="btn btn-default login-btn" >
                            Register as a manager
                        </button>
                </a>


                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
