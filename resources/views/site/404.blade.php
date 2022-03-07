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
                                style="font-size: 14pt; color: green;"><strong>¡Ups, página no encontrada!

                                </strong></span>
                                <br>
                            <a type="button" class="btn btn-outline-success btn-lg"
                                href="{{ URL::to('home') }}">Regresar</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
