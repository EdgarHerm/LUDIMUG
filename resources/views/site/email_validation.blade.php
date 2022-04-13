@extends('layouts.layout')

@section('content')
    <div class="container text-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="container-fluid ">
                        <img src="{{ asset('img/LUDIMUG_TORRE.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row" style="padding: 30px 0;">
                        <div class="col-md-12" style="text-align: center;"><span
                                style="font-size: 14pt; color: green;"><strong>Verificar correo electrónico, revisa tu
                                    bandeja de entrada o correo no deseado
                                </strong></span>
                            <br>
                            @if (Html::ul($errors->all()))
                                <div class="alert alert-danger" role="alert">
                                    {{ Html::ul($errors->all()) }}
                                </div>
                            @endif

                            {{ Form::open(['url' => '/email_validation']) }}
                            <input type="text" class="form-control" placeholder="Introduce el token" name="token"
                                id="token" required>
                            {{ Form::submit('Validar', ['class' => 'btn btn-outline-success']) }}
                            {{ Form::close() }}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
