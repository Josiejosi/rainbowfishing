<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from spark.bootlab.io/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Jan 2019 04:48:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">
    <link rel="icon" href="favicon.ico">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset( 'css/app.css' ) }}" rel="stylesheet">

</head>

<body>
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/home"><img src="{{ asset( 'img/icon.png' ) }}" height="65px"></a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">

                    @include( 'partials.notifications' )
                    <li class="nav-item dropdown ml-lg-2">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                            <span class="d-none d-lg-inline-block">Profile</span>
                            <span class="d-lg-none"><i class="align-middle fas fa-cog"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-user"></i> View Profile</a>
                            <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-chart-pie"></i>View Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"

                                href="{{ route('logout') }}">
                                <i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i> 
                                Sign out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="header">
        <div class="container">
            <div class="media text-white">
                <img src="img/avatar.jpg" class="avatar img-fluid rounded-circle mr-3" alt="Linda Miller" />
                <div class="media-body">
                    <h3 class="mb-1 text-white font-weight-normal">Linda Miller</h3>
                    <span class=" font-weight-normal">831 Arron Smith Drive, NE 68438</span>
                </div>
            </div>
        </div>
    </div>

    <main class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                    <a class="card d-block d-md-none mt-4" data-toggle="collapse" data-target="#sidebar">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Menu</h5>
                        </div>
                    </a>

                    <nav id="sidebar" class="collapse collapse-disabled-md sidebar sidebar-sticky">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Main</h5>
                            </div>
                            <div class="sidebar-content">
                                <a href="index-2.html" class="sidebar-item">
                      <i class="align-middle mr-1 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                                <a class="sidebar-item" href="#layouts" data-toggle="collapse">
                      <i class="align-middle mr-1 fas fa-fw fa-desktop"></i> <span class="align-middle">Layouts</span>
                    </a>
                                <div class="sidebar-dropdown collapse" id="layouts" data-parent="#sidebar">
                                    <a class="sidebar-item" href="layouts-sidebar-right.html">Right Sidebar</a>
                                    <a class="sidebar-item" href="layouts-sidebar-static.html">Static Sidebar</a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Elements</h5>
                            </div>
                            <div class="sidebar-content">
                                <a class="sidebar-item" href="#ui" data-toggle="collapse">
                      <i class="align-middle mr-1 fas fa-fw fa-flask"></i> <span class="align-middle">User Interface</span>
                    </a>
                                <div class="sidebar-dropdown collapse" id="ui" data-parent="#sidebar">
                                    <a class="sidebar-item" href="ui-alerts.html">Alerts</a>
                                    <a class="sidebar-item" href="ui-buttons.html">Buttons</a>
                                    <a class="sidebar-item" href="ui-cards.html">Cards</a>
                                    <a class="sidebar-item" href="ui-general.html">General</a>
                                    <a class="sidebar-item" href="ui-grid.html">Grid</a>
                                    <a class="sidebar-item" href="ui-modals.html">Modals</a>
                                    <a class="sidebar-item" href="ui-notifications.html">Notifications</a>
                                    <a class="sidebar-item" href="ui-tabs.html">Tabs</a>
                                    <a class="sidebar-item" href="ui-typography.html">Typography</a>
                                </div>
                            </div>
                            <div class="sidebar-content">
                                <a class="sidebar-item" href="#charts" data-toggle="collapse">
                      <i class="align-middle mr-1 fas fa-fw fa-chart-pie"></i> <span class="align-middle">Charts</span>
                    </a>
                                <div class="sidebar-dropdown collapse" id="charts" data-parent="#sidebar">
                                    <a class="sidebar-item" href="charts-chartjs.html">Chart.js</a>
                                    <a class="sidebar-item" href="charts-apexcharts.html">ApexCharts</a>
                                    <a class="sidebar-item" href="charts-morrisjs.html">Morris.js</a>
                                </div>
                            </div>
                            <div class="sidebar-content">
                                <a class="sidebar-item" href="#forms" data-toggle="collapse">
                      <i class="align-middle mr-1 fas fa-fw fa-check-square"></i> <span class="align-middle">Forms</span>
                    </a>
                                <div class="sidebar-dropdown collapse" id="forms" data-parent="#sidebar">
                                    <a class="sidebar-item" href="forms-layouts.html">Layouts</a>
                                    <a class="sidebar-item" href="forms-basic-elements.html">Basic Elements</a>
                                    <a class="sidebar-item" href="forms-advanced-elements.html">Advanced Elements</a>
                                    <a class="sidebar-item" href="forms-input-groups.html">Input Groups</a>
                                    <a class="sidebar-item" href="forms-editors.html">Editors</a>
                                    <a class="sidebar-item" href="forms-validation.html">Validation</a>
                                    <a class="sidebar-item" href="forms-wizard.html">Wizard</a>
                                </div>
                            </div>
                            <div class="sidebar-content">
                                <a class="sidebar-item" href="#tables" data-toggle="collapse">
                      <i class="align-middle mr-1 fas fa-fw fa-table"></i> <span class="align-middle">Tables</span>
                    </a>
                                <div class="sidebar-dropdown collapse" id="tables" data-parent="#sidebar">
                                    <a class="sidebar-item" href="tables-bootstrap.html">Bootstrap</a>
                                    <a class="sidebar-item" href="tables-datatables.html">DataTables</a>
                                </div>
                            </div>
                            <div class="sidebar-content">
                                <a class="sidebar-item" href="#maps" data-toggle="collapse">
                      <i class="align-middle mr-1 fas fa-fw fa-map-marker-alt"></i> <span class="align-middle">Maps</span>
                    </a>
                                <div class="sidebar-dropdown collapse" id="maps" data-parent="#sidebar">
                                    <a class="sidebar-item" href="maps-google.html">Google Maps</a>
                                    <a class="sidebar-item" href="maps-vector.html">Vector Maps</a>
                                </div>
                            </div>
                            <div class="sidebar-content">
                                <a class="sidebar-item" href="#icons" data-toggle="collapse">
                      <i class="align-middle mr-1 fas fa-fw fa-heart"></i> <span class="align-middle">Icons</span>
                    </a>
                                <div class="sidebar-dropdown collapse" id="icons" data-parent="#sidebar">
                                    <a class="sidebar-item" href="icons-font-awesome.html">Font Awesome</a>
                                    <a class="sidebar-item" href="icons-ion.html">Ion Icons</a>
                                    <a class="sidebar-item" href="icons-feather.html">Feather Icons</a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Extras</h5>
                            </div>
                            <div class="sidebar-content">
                                <a class="sidebar-item" href="#pages" data-toggle="collapse">
                            <i class="align-middle mr-1 fas fa-fw fa-file"></i> <span class="align-middle">Pages</span>
                        </a>
                                <div class="sidebar-dropdown collapse" id="pages" data-parent="#sidebar">
                                    <a class="sidebar-item " href="pages-sign-in.html">Sign In</a>
                                    <a class="sidebar-item " href="pages-sign-up.html">Sign Up</a>
                                    <a class="sidebar-item " href="pages-reset-password.html">Reset Password</a>
                                    <a class="sidebar-item  active" href="pages-blank.html">Blank Page</a>
                                    <a class="sidebar-item " href="pages-404.html">404 Page</a>
                                    <a class="sidebar-item " href="pages-500.html">500 Page</a>
                                    <a class="sidebar-item " href="pages-invoice.html">Invoice</a>
                                </div>
                                <a href="documentation.html" class="sidebar-item">
                            <i class="align-middle mr-1 fas fa-fw fa-book"></i> <span class="align-middle">Getting Started</span>
                        </a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10 pl-lg-4">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Empty card</h5>
                                </div>
                                <div class="card-body">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <hr />
            <div class="text-muted text-center">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Terms of Service</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Contact</a>
                    </li>
                </ul>
                <p>
                    &copy; {{ date( 'Y' ) }} - <a href="/home" class="text-muted">{{ config('app.name', 'Laravel') }}</a>
                </p>
            </div>
        </div>
    </footer>
    <script src="{{ asset( 'js/app.js' ) }}"></script>

    <svg width="0" height="0" style="position:absolute">
    <defs>
      <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong"><path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z"></path></symbol>
    </defs>
  </svg>
</body>

</html>