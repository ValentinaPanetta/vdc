<nav class="navbar navbar-expand-md navbar-dark row fixed-top shadow-sm" id="main_navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    VDC
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="" id="toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse pl-3" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('references') }}">References</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('partners') }}">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('newsletter') }}">Newsletter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('courses') }}">Courses</a>
                        </li>
                        @auth
                            <li class="nav-item">
                            <a class="nav-link" href="{{ url('blog') }}">Blog/News</a>
                            </li>
                           

                            @if(Auth::user()->role == 'sys_admin' or Auth::user()->role == 'off_admin')
                                <li class="nav-item">
                                     <a class="nav-link" href="{{ url('admin') }}">Admin Panel</a>
                                </li>
                            @endif
                            <li class="nav-item">
                            <a class="nav-link" href="{{ url('calendar') }}">Calendar</a>
                            </li>
                        @endauth

                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                

                                @switch(Auth::user()->role) 
                                @case('client')
                                    
                                         <a class="dropdown-item" href="{{ url('client/'.Auth::user()->id) }}">My Profile</a>
                                    
                                @break
                                @case('consultant')
                                    
                                         <a class="dropdown-item" href="{{ url('consultant/'.Auth::user()->id) }}">My Profile</a>
                                    
                                @break
                                @case('trainer')
                                    
                                         <a class="dropdown-item" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                                    
                                @break
                                @case('course_provider')
                                    
                                         <a class="dropdown-item" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                                    
                                @break
                                @endswitch
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
