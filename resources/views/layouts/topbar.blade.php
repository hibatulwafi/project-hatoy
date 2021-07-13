            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index" class="logo">
                        <span>
                            <img src="{{ URL::asset('assets/images/icon-main-large.jpeg')}}" alt="" height="56">
                        </span>
                        <i>
                            <img src="{{ URL::asset('assets/images/icon-main.jpeg')}}" alt="" height="30">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">


                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                   Halo, {{Auth::user()->name}}
                                    <img src="{{ URL::asset('assets/images/users/avatar.jpg')}}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <button type="submit" class="d-none" id='logout'></button>
                                        <a class="dropdown-item text-danger" onclick="$('#logout').click()"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </form>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
