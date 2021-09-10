<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Human Resource Management System</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    
    @yield('css')

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">HRMS
            <button type="button" id="sidebarCollapse" class="btn btn-info" style="margin-left: 70%;">
                <i class="bi bi-list"></i>
            </button></a>

            <ul class="navbar-nav">
                @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @if (Route::has('register'))	
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-bell fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>    
    </nav>

    <div class="wrapper">
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('showEmployee') }}">Employee</a>
                </li>
                <li>
                    <a href="#">Attendance</a>
                </li>
                <li>
                    <a href="#">Leave</a>
                </li>
                <li>
                    <a href="#">Payroll</a>
                </li>
                <li>
                    <a href="{{ route('admin.show') }}">
                        Online Recruitment <span class="label label-pill label-danger count"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('showCalendar') }}">Calendar</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route('showState') }}">{{ __('State') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showCity') }}">{{ __('City') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showCountry') }}">{{ __('Country') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showBankname') }}">{{ __('Bank Name') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showDept') }}">{{ __('Department') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showJobtitle') }}">{{ __('Job Title') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showEmployment') }}">{{ __('Employment Type') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showWRKtime') }}">{{ __('Working Time') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showLeavetype') }}">{{ __('Leave Type') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="content">
            <main class="py-4">
                    @yield('content')
            </main>
        </div>
       
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/onlinerecruit.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        
        function openForm(evt, formName) {
            var i, navcontent, navlinks;
            navcontent = document.getElementsByClassName("navcontent");
            for (i = 0; i < navcontent.length; i++) {
                navcontent[i].style.display = "none";
            }

            navlinks = document.getElementsByClassName("nav-link");
            for (i = 0; i < navlinks.length; i++) {
                navlinks[i].className = navlinks[i].className.replace(" active", "");
            }

            document.getElementById(formName).style.display = "block";
                evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
        
        /* $(document).ready(function(){

            function load_unseen_notification(view = '')
            {
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{view:view},
                    dataType:"json",
                    success:function(data)
                    {
                        
                    }
                })
            }

        }); */
    </script>
    @yield('script')
    
</body>
</html>