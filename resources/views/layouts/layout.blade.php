<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style_helper.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="icon" href="{{ asset('img/ludimug_solo.png') }}">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/init.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @if (session()->has('error'))
        <script>
            $(document).ready(function() {
                $("#myToast").toast("show");
            });
        </script>
    @endif
    <title>LUDIM-UG</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/ludimug.png') }}" alt="" width="80px" height="43px"
                class="d-inline-block align-text-top" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle
        navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
            <ul class="nav navbar-nav justify-content-end">
                @guest
                @else
                    @if (Auth::user()->token)
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->usuario }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if(Auth::user()->rol == 1)
                                    <li><a class="dropdown-item" href="{{ URL::to('/profile') }}">Perfil</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::to('/sars_user') }}">Mis reportes</a></li>
                                    @else

                                    @endif
                                    <li><a class="dropdown-item" href="{{ URL::to('logout') }}">Salir</a></li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link fw-bolder" href="{{ URL::to('/') }}">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->usuario }}
                                </button>
                                <ul class="dropdown-menu right" aria-labelledby="dropdownMenuButton1">

                                    @if(Auth::user()->rol == 1)
                                    <li><a class="dropdown-item" href="{{ URL::to('/sars_user') }}">Mis reportes</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::to('/profile') }}">Perfil</a></li>
                                    @else

                                    @endif
                                    <li><a class="dropdown-item" href="{{ URL::to('logout') }}">Salir</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif

                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="col-12" style="
            background: linear-gradient(
                90deg,
                rgba(17, 50, 81, 1) 0%,
                rgba(41, 167, 32, 1) 44%,
                rgba(255, 255, 253, 1) 100%
            );
            height: 7px;
        "></div>

<body onload="validaciones()">

    <div class="container">

        <div class="container-fluid m-3">

            @yield('content')

        </div>

    </div>

</body>

</html>
