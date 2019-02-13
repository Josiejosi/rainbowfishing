<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">
    <link rel="icon" href="favicon.ico">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset( 'css/app.css' ) }}" rel="stylesheet">

    <style>
        
        @-webkit-keyframes change_background_color {
          to {
            color: #2cabe2;
          }
        }

        @-moz-keyframes change_background_color {
          to {
            color: #2cabe2;
          }
        }

        @-ms-keyframes change_background_color {
          to {
            color: #2cabe2;
          }
        }

        @keyframes change_background_color {
          to {
            color: #2cabe2;
          }
        }

        .fish-me {
          -webkit-animation-name: change_background_color;
          -moz-animation-name: change_background_color;
          -ms-animation-name: change_background_color;
          animation-name: change_background_color;
          -webkit-animation-duration: 1s;
          -moz-animation-duration: 1s;
          -ms-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-iteration-count: 16;
          -moz-animation-iteration-count: 16;
          -ms-animation-iteration-count: 16;
          animation-iteration-count: 16;
          -webkit-animation-direction: alternate;
          -moz-animation-direction: alternate;
          -ms-animation-direction: alternate;
          animation-direction: alternate;
          -webkit-animation-timing-function: ease-in-out;
          -moz-animation-timing-function: ease-in-out;
          -ms-animation-timing-function: ease-in-out;
          animation-timing-function: ease-in-out;
        }

    </style>

</head>

<body>
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/home"><img src="{{ asset( 'img/icon.png' ) }}" height="45px"></a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">

                    @include( 'partials.notifications' )
                    <li class="nav-item dropdown ml-lg-2">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                            <span class="d-none d-lg-inline-block">Profile</span>
                            <span class="d-lg-none"><i class="align-middle fas fa-cog"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-key"></i> Update Password</a>
                            <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-user"></i> Update Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"

                                href="{{ route('logout') }}">
                                <i class="align-middle mr-1 fas fa-fw fa-lock"></i> 
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
                <img src="{{ asset( 'img/avatar.png' ) }}" width="45px">
                <div class="media-body">
                    @if ( auth()->user()->account != null )
                    <h4 class="mb-1 text-white font-weight-normal">{{ auth()->user()->account->bank }}</h4>
                    <span class=" font-weight-normal">{{ auth()->user()->account->account_holder }}, {{ auth()->user()->account->account_number }}</span>
                    @else
                    <span class=" font-weight-normal">Bank Account not linked.</span>
                    @endif
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
                    
                    @include( 'partials.sidemenu' )

                </div>
                <div class="col-12 col-md-8 col-lg-9 col-xl-10 pl-lg-4">

                    <div class="row">

                        <div class="col-12">

                            @include('flash::message')

                            @yield('content')
                            

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
    <script src="{{ asset( 'js/vue.min.js' ) }}"></script>
    <script src="{{ asset( 'js/main.js' ) }}"></script>

    @yield('js')

    <script> $('#flash-overlay-modal').modal() ; </script>

    <svg width="0" height="0" style="position:absolute">
    <defs>
      <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong"><path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z"></path></symbol>
    </defs>
  </svg>
</body>

</html>