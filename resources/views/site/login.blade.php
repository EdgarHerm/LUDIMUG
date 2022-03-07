@extends('layouts.layout')

@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('img/UG.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Iniciar Sesión</h5>
                    {{ Html::ul($errors->all()) }}
                    {{ Form::open(['url' => '/login']) }}
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        {{ Form::label('email', 'Correo electrónico', ['class' => 'form-label']) }}
                        {{ Form::email('email', Request::old('email'), ['class' => 'form-control', 'required' => true]) }}
                        
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        {{ Form::label('password', 'Contraseña', ['class' => 'form-label']) }}
                        {{ Form::password('password', ['class' => 'form-control full-width', 'required' => true]) }}
                        
                    </div>
                    <div class="mb-3">
                    No tienes una cuenta? <a href="{{ URL::to('/register') }}">Registrate</a>
                    </div>
                    <div class="d-grid gap-2">
                    {{ Form::submit('Iniciar Sesión', ['class' => 'btn btn-outline-success']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/ludimug1.jpeg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/ludimug2.jpeg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <video>
                            <source src="{{ asset('img/torre.mp4') }}" class="d-block w-100" alt="..." type="video/mp4">
                        </video>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
@endsection
