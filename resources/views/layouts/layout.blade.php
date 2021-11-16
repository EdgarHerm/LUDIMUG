<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/bootstrap.css.map') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <script src="{{ secure_asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/bootstrap.js.map') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/bootstrap.min.js.map') }}" type="text/javascript"></script>
    
    <script src="{{ secure_asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#reportTable').DataTable();
        });
    </script>
    <title>LUDIM-UG</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ secure_asset('img/escudoug.png') }}" alt="" width="90px" class="d-inline-block align-text-top" />
            |
            <img src="{{ secure_asset('img/ludimug.png') }}" alt="" width="80px" height="33px"
                class="d-inline-block align-text-top" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle
        navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
            <ul class="nav navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link fw-bolder link-success" aria-current="page"
                        href="{{ URL::to('studies') }}">Estudios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder" href="{{ URL::to('/') }}">Inicio</a>
                </li>
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

<body>
    <div class="container-fluid">
        <div class="container m-3">
            @yield('content')
        </div>
    </div>
</body>

</html>
