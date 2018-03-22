<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/admin/style.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/fontawesome-all.min.css') }}">
        <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">
        <meta name="theme-color" content="#0093E9">
        <title>@yield('title') Administrator Karyaku</title>
        <style>
            @media screen and (max-width: 992px) {
                .app-body {
                    margin-top: 0px !important;
                }
            }
        </style>
    </head>
    <body>
        <header class="app-header navbar">
            <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{ asset('/img/karyaku-full-200px.png') }}" alt="karyaku logo" height="30" class="img-responsive"></a>
            <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav navbar-nav d-md-down-none">
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">Settings</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-center">
                            <strong>Settings</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Logout</a>
                    </div>
                </li>
            </ul>
            </button>
        </header>
        <div class="app-body">
            <div class="sidebar">
                <nav class="sidebar-nav">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="main.html"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
                        </li>
                        <li class="nav-title">
                            Theme
                        </li>
                        <li class="nav-item">
                            <a href="colors.html" class="nav-link"><i class="icon-drop"></i> Colors</a>
                        </li>
                        <li class="nav-item">
                            <a href="typography.html" class="nav-link"><i class="icon-pencil"></i> Typograhy</a>
                        </li>
                        <li class="nav-title">
                            Components
                        </li>
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Base</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="base/breadcrumb.html"><i class="icon-puzzle"></i> Breadcrumb</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/cards.html"><i class="icon-puzzle"></i> Cards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/carousel.html"><i class="icon-puzzle"></i> Carousel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/collapse.html"><i class="icon-puzzle"></i> Collapse</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/forms.html"><i class="icon-puzzle"></i> Forms</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/jumbotron.html"><i class="icon-puzzle"></i> Jumbotron</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/list-group.html"><i class="icon-puzzle"></i> List group</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/navs.html"><i class="icon-puzzle"></i> Navs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/pagination.html"><i class="icon-puzzle"></i> Pagination</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/popovers.html"><i class="icon-puzzle"></i> Popovers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/progress.html"><i class="icon-puzzle"></i> Progress</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/switches.html"><i class="icon-puzzle"></i> Switches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/tables.html"><i class="icon-puzzle"></i> Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/tabs.html"><i class="icon-puzzle"></i> Tabs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="base/tooltips.html"><i class="icon-puzzle"></i> Tooltips</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-cursor"></i> Buttons</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="buttons/buttons.html"><i class="icon-cursor"></i> Buttons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buttons/button-group.html"><i class="icon-cursor"></i> Buttons Group</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buttons/dropdowns.html"><i class="icon-cursor"></i> Dropdowns</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buttons/social-buttons.html"><i class="icon-cursor"></i> Social Buttons</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
                        </li>
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="icons/flags.html"><i class="icon-star"></i> Flags <span class="badge badge-success">NEW</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="icons/font-awesome.html"><i class="icon-star"></i> Font Awesome <span class="badge badge-secondary">4.7</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="icons/simple-line-icons.html"><i class="icon-star"></i> Simple Line Icons</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bell"></i> Notifications</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="notifications/alerts.html"><i class="icon-bell"></i> Alerts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="notifications/badge.html"><i class="icon-bell"></i> Badge</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="notifications/modals.html"><i class="icon-bell"></i> Modals</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets <span class="badge badge-primary">NEW</span></a>
                        </li>
                        <li class="divider"></li>
                        <li class="nav-title">
                            Extras
                        </li>
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="views/pages/login.html" target="_top"><i class="icon-star"></i> Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="views/pages/register.html" target="_top"><i class="icon-star"></i> Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="views/pages/404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="views/pages/500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mt-auto">
                            <a class="nav-link nav-link-success" href="https://coreui.io" target="_top"><i class="icon-cloud-download"></i> Download CoreUI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top"><i class="icon-layers"></i> Try CoreUI <strong>PRO</strong></a>
                        </li>
                    </ul>
                </nav>
                <button class="sidebar-minimizer brand-minimizer" type="button"></button>
            </div>

            @yield('content')

        </div>
        
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/vue.js') }}"></script>
        <script src="{{ asset('/js/axios.min.js') }}"></script>
        <script src="{{ asset('/js/admin/app.js') }}"></script>
        @stack('js')
    </body>
</html>