
<!-- auth()->logout() }} -->
<!doctype html>
<html lang="en-us">
    
<!-- Mirrored from dashboard.zawiastudio.com/demo/home-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Apr 2018 19:48:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home Overview | Dashboard UI Kit</title>
        <meta name="description" content="Dashboard UI Kit">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('lib/jquery.timepicker.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('lib/jquery.timepicker.css') }}" />
        <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-datepicker.css') }}" />
    


        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">


        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet">

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    
        
      

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.min3661.css?v=2.0') }}">
    </head>
    <body class="o-page">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <div class="o-page__sidebar js-page-sidebar">
            <div class="c-sidebar">
                <a class="c-sidebar__brand" href="#">
                <img class="c-sidebar__brand-img" src="{{ asset('images/logo.png') }}" alt="Logo"> 
                </a>

                @if(Auth::user()->u_type != "man")
                <li class="c-sidebar__item">
                        <a class="c-sidebar__link is-active" href="{{ url('/home') }}">
                                <i class="fa fa-calendar-times-o u-mr-xsmall"></i>Time Sheet
                            </a>
                </li>

                    
                @else
                <li class="c-sidebar__item">
                        <a class="c-sidebar__link " href="{{ url('/home') }}">
                                <i class="fa fa-dashboard u-mr-xsmall"></i>Dashboard
                            </a>
                    </li>
                
               <!-- <h4 class="c-sidebar__title">Courses</h4> -->
                <ul class="c-sidebar__list">


                    <li class="c-sidebar__item">
                    <a class="c-sidebar__link " href="{{ route('client.view') }}">
                            <i class="fa fa-users u-mr-xsmall"></i>Clients
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link " href="{{ route('project.view') }}">
                                <i class="fa fa-sticky-note u-mr-xsmall"></i>Projects
                            </a>
                        </li>

                        <li class="c-sidebar__item">
                                <a class="c-sidebar__link " href="{{ route('manager.view') }}">
                                        <i class="fa fa-user-circle-o u-mr-xsmall"></i>Mangers
                                    </a>
                                </li>


                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link " href="{{ route('employee.view') }}">
                                <i class="fa fa-users u-mr-xsmall"></i>Employees
                            </a>
                        </li>

                   
                        @endif
                        

                   


                </ul>


            </div><!-- // .c-sidebar -->
        </div><!-- // .o-page__sidebar -->






        <main class="o-page__content">
            <header class="c-navbar u-mb-medium" style="background:#3b5998;">
                <button class="c-sidebar-toggle u-mr-small">
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                </button><!-- // .c-sidebar-toggle -->

                <h2 class="c-navbar__title u-mr-auto" style="color:white;"><?php //echo $pagenamme; ?></h2>
                


                <div class="c-dropdown dropdown">
                    <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="c-avatar__img" src="{{ asset('images/'.Auth::user()->image) }}" alt="User's Profile Picture">
                    </a>

                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                        @if(Auth::user()->u_type == "man")
                    <a class="c-dropdown__item dropdown-item" href="{{ route('manager.edit') }}">Edit Profile</a>
                        <a class="c-dropdown__item dropdown-item" href="{{ route('manager.profile', ['id' => Auth::user()->id]) }}">View profile</a>
                        @else
                        <span class="c-dropdown__item dropdown-item" href="{{ route('manager.edit') }}">{{ Auth::user()->name }}</span>
                        <a class="c-dropdown__item dropdown-item" href="{{ route('employee.getEmployeeProfile', ['id' => \App\employee::where('employee_user_id', '=', Auth::user()->id)->first()->employee_id]) }}">View profile</a>
                        <a class="c-dropdown__item dropdown-item" href="{{ route('employee.edit') }}">Edit Profile</a>
                        @endif
                    <a class="c-dropdown__item dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </header>

            <div class="container-fluid">
                <div class="row">
                   

                    @yield('content')

                    
                    
                </div><!-- // .row -->

            </div><!-- // .container -->
            
        </main><!-- // .o-page__content -->
        
        <!-- Main javascsript -->
        <script src="{{ asset('assets/js/main.min3661.js?v=2.0') }}"></script>

     
            <script>
                @if(Session::has('success'))
                    alert("{{ Session::get('success') }}"); 
                @endif

                 @if(Session::has('error'))
                   alert("{{ Session::get('error') }}")
                @endif

            




            </script>

    </body>

<!-- Mirrored from dashboard.zawiastudio.com/demo/home-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Apr 2018 19:48:52 GMT -->
</html>