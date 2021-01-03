@extends('layouts.default')
@section ('title','Trang Administrator')

@section ('sidebar')
{{-- @parent --}}

{{-- <div class="admin-grid" id="body-admin">
    <div class="header-admin"> administrator page </div>
</div> --}}
@push('styles')
    <link href="{{ url('/style/adminStyle.css') }}" rel="stylesheet">
@endpush

<body class="overlay-scrollbar">
    {{-- navbar --}}
    <div class="navbar">
        {{-- nav left --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fas fa-bars" onclick="collapseSidebar()"></i>
                </a>
            </li>
            <li class="nav-item">
                <img src="assets/AT-pro-black.png" alt="ATPro logo" class="logo logo-light">
                <img src="assets/AT-pro-white.png" alt="ATPro logo" class="logo logo-dark">
            </li>
        </ul>
        {{-- end nav left --}}
        {{-- form --}}
        <form class="navbar-search">
            <input type="text" name="Search" class="navbar-search-input" placeholder="What you looking for...">
            <i class="fas fa-search"></i>
        </form>
        {{-- end form --}}
        {{-- nav right --}}
        <ul class="navbar-nav nav-right">
            <li class="nav-item mode">
                <a class="nav-link" href="#" onclick="switchTheme()">
                    <i class="fas fa-moon dark-icon"></i>
                    <i class="fas fa-sun light-icon"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link">
                    <i class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
                    <span class="navbar-badge">15</span>
                </a>
                <ul id="notification-menu" class="dropdown-menu notification-menu">
                    <div class="dropdown-menu-header">
                        <span>
							Notifications
						</span>
                    </div>
                    <div class="dropdown-menu-content overlay-scrollbar scrollbar-hover">
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<br>
									<span>
										15/07/2020
									</span>
                                </span>
                            </a>
                        </li>
                    </div>
                    <div class="dropdown-menu-footer">
                        <span>
							View all notifications
						</span>
                    </div>
                </ul>
            </li>
            <li class="nav-item avt-wrapper">
                <div class="avt dropdown">
                    <img src="#" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
                    <ul id="user-menu" class="dropdown-menu">
                        <li class="dropdown-menu-item">
                            <a class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-cog"></i>
                                </div>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="far fa-credit-card"></i>
                                </div>
                                <span>Payments</span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-spinner"></i>
                                </div>
                                <span>Projects</span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        {{-- end nav right --}}
    </div>
    {{-- end navbar --}}
    {{-- sidebar --}}
    <div class="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>
						Dashboard
					</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link active">
                    <div>
                        <i class="fab fa-accusoft"></i>
                    </div>
                    <span>Lorem</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-tasks"></i>
                    </div>
                    <span>Morbi</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-spinner"></i>
                    </div>
                    <span>Praesent</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <span>Pellentesque</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-bug"></i>
                    </div>
                    <span>Morbi</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span>Praesent</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-book-open"></i>
                    </div>
                    <span>Pellentesque</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-adjust"></i>
                    </div>
                    <span>Morbi</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fab fa-algolia"></i>
                    </div>
                    <span>Praesent</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-audio-description"></i>
                    </div>
                    <span>Pellentesque</span>
                </a>
            </li>
        </ul>
    </div>
    {{-- end sidebar --}}


    {{-- main content --}}

    {{-- end main content --}}


    {{-- import script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    {{-- <script src="index.js"></script> --}}
    {{-- end import script --}}
    @push('scripts')
    <script type="text/javascript" src="{{ url('/js/scriptAdmin.js') }}"></script>
    @endpush
</body>
@endsection

@section ('content')
