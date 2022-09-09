<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--  Social tags      -->
        <meta name="keywords" content="computerfreaker, computerfreaker api, cf api, cfs api, cfapi, api cf, api computerfreaker">
        <meta name="description" content="This is the dashboard for my API">
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="CF API Dashboard">
        <meta itemprop="description" content="This is the dashboard for my API">
        <meta itemprop="image" content="https://computerfreaker.pw/profile/profile.png">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@computerfreaker">
        <meta name="twitter:title" content="CF API Dashboard">
        <meta name="twitter:description" content="This is the dashboard for my API">
        <meta name="twitter:creator" content="@computerfreaker">
        <meta name="twitter:image" content="https://computerfreaker.pw/profile/profile.png">
        <!-- Open Graph data -->
        <meta property="og:title" content="CF API Dashboard" />
        <meta property="og:type" content="dashboard" />
        <meta property="og:url" content="https://image.computerfreaker.pw" />
        <meta property="og:image" content="This is the dashboard for my API" />
        <meta property="og:site_name" content="CF API" />
        <title>{{ config('app.name', 'Black Dashboard Laravel - Free Laravel Preset') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    </head>
        <body class="">
        @auth()
            <div class="wrapper">
                    @include('layouts.navbars.sidebar')
                <div class="main-panel">
                    @include('layouts.navbars.navbar')

                    <div class="content">
                        @yield('content')
                    </div>

                    @include('layouts.footer')
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            @include('layouts.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        @endauth
                            
            <div class="main-panel">
                    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                            <div class="container-fluid">
                                <div class="navbar-wrapper">
                                    <div class="navbar-toggle d-inline">
                                        <button type="button" class="navbar-toggler">
                                            <span class="navbar-toggler-bar bar1"></span>
                                            <span class="navbar-toggler-bar bar2"></span>
                                            <span class="navbar-toggler-bar bar3"></span>
                                        </button>
                                    </div>
                                    <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navigation">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="search-bar input-group">
                                            <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                                <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                                            </button>
                                        </li>
                                        <li class="dropdown nav-item">
                                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                                <div class="notification d-none d-lg-block d-xl-block"></div>
                                                <i class="tim-icons icon-sound-wave"></i>
                                                <p class="d-lg-none"> {{ __('Notifications') }} </p>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Mike John responded to your email') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('You have 5 more tasks') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Your friend Michael is in town') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Another notification') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Another one') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown nav-item">
                                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                                <div class="photo">
                                                    <img src="{{ asset('black') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                                                </div>
                                                <b class="caret d-none d-lg-block d-xl-block"></b>
                                                <p class="d-lg-none">{{ __('Log out') }}</p>
                                            </a>
                                            <ul class="dropdown-menu dropdown-navbar">
                                                <li class="nav-link">
                                                    <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                                                </li>
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-link">
                                                    <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="separator d-lg-none"></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                                            <i class="tim-icons icon-simple-remove"></i>
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
          </button>
        </div>
    </div>
</div>
</div>


                <div class="content">
                        <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#" class="btn btn-sm btn-primary">Add user</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col"></th>
                        </tr></thead>
                        <tbody>
                                                                <tr>
                                    <td>Admin Admin</td>
                                    <td>
                                        <a href="mailto:admin@black.com">admin@black.com</a>
                                    </td>
                                    <td>24/02/2020 16:47</td>
                                    <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                                                        </div>
                                            </div>
                                    </td>
                                </tr>
                                                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    
                </nav>
            </div>
        </div>
        <div class="alert alert-danger">
                <span>
                  <b> </b> This is a <b>PRO</b> feature!</span>
              </div>
    </div>
</div>
                </div>

                <footer class="footer">
<div class="container-fluid">
    <ul class="nav">
        <li class="nav-item">
            <a href="#" class="nav-link">
                About Us
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                Blog
            </a>
        </li>
    </ul>
    <div class="copyright">
        © 2022 made with <i class="tim-icons icon-heart-2"></i> by
        <a href="https://computerfreaker.pw" target="_blank">computerfreaker</a>
    </div>
</div>
</footer>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="ub2DzAIrgUnghVvu3l3KAbbq0UztNO8yfkrDNm6n">            
        </form>
        <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors text-center">
                    <span class="badge filter badge-primary active" data-color="primary"></span>
                    <span class="badge filter badge-info" data-color="blue"></span>
                    <span class="badge filter badge-success" data-color="green"></span>
                </div>
                <div class="clearfix"></div>
                </a>
            </li>
            </ul>
        </div>
    </div>
    <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    {{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
    <!--  Notifications Plugin    -->
    <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

    <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
    <script src="{{ asset('black') }}/js/theme.js"></script>

    @stack('js')

    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (white_color == true) {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').removeClass('white-content');
                            }, 900);
                            white_color = false;
                        } else {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').addClass('white-content');
                            }, 900);

                            white_color = true;
                        }
                });

                $('.light-badge').click(function() {
                    $('body').addClass('white-content');
                });

                $('.dark-badge').click(function() {
                    $('body').removeClass('white-content');
                });
            });
        });
    </script>
    @stack('js')
    <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
</body>
</html>
