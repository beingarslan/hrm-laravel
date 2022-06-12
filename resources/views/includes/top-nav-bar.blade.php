<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href={{url('')}}>
                        <!-- <img class="brand-logo" alt="stack admin logo" src="{{asset('assets/app-assets/images/logo/stack-logo-light.png')}}" /> -->
                        <h2 class="brand-text">{{env("APP_NAME")}}</h2>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu"></i></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="avatar bg-primary avatar-online">
                                <span>{{substr(Auth::user()->first_name, 0, 1)}}</span>
                            </div>
                            <span class="user-name">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/user/edit/{{Auth::id()}}"><i class="feather icon-user"></i> Edit Profile</a>
                            <a class="dropdown-item" href="/attendances/attendance"><i class="feather icon-calendar"></i> My Attendence</a>
                            <a class="dropdown-item" href="/users/security"><i class="feather icon-lock"></i> Security Settings</a>
                            <a class="dropdown-item" href="/users/approvals"><i class="feather icon-mail"></i> My Approvals</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="feather icon-power"></i> Logout</a>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>