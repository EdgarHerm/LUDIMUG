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
                                style="font-size: 14pt; color: green;"><strong>¿Tienes dudas? Solicita tu prueba de COVID-19 sí presentas uno o más síntomas. Llena el formulario en el siguiente botón: <button type="button" class="btn btn-outline-success btn-lg">Registrar Estudio</button></strong></span></div>
                    </div>
                    
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="block ">
                        <div class="moduletable">

                            <div class="module-title">
                                <h3 class="title"><span class=""></span>NO PIERDAS DE VISTA
                                </h3>
                            </div>
                            <div class="module-content">


                                <div class="custom">
                                    <div class="row" style="padding: 0px 0;">
                                        <div class="col-md-12" style="text-align: center;"><span
                                                style="font-size: 18pt; color: #808080;"><strong>SINTOMAS DE
                                                    COVID-19</strong></span></div>
                                    </div>
                                    
                                    <div class="row" style="padding: 30px 0;">
                                        <div class="col-md-12" style="text-align: center;"><span
                                                style="font-size: 14pt; color: #000066;"><strong>Una persona debe
                                                    sospechar de COVID-19 cuando presenta al menos dos de los
                                                    siguientes síntomas:</strong></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;"><img
                                                src="{{ asset('img/sintoma1.png') }}" alt="sintoma1"
                                                style="margin: 10px 25px;"><img src="{{ asset('img/sintoma2.png')}}"
                                                alt="sintoma2" style="margin: 10px 25px;"><img
                                                src="{{ asset('img/sintoma3.png')}}" alt="sintoma3"
                                                style="margin: 10px 25px;"></div>
                                    </div>
                                    <div class="row" style="padding: 30px 0;">
                                        <div class="col-md-12" style="text-align: center;"><span
                                                style="font-size: 14pt; color: #000066;"><strong>Y se acompaña de
                                                    alguno de los siguientes:</strong></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;"><img
                                                src="{{ asset('img/sintoma4.png') }}" alt="sintoma4"
                                                style="margin: 10px 5px;"><img src="{{ asset('img/sintoma5.png')}}"
                                                alt="sintoma5" style="margin: 10px 5px;"><img
                                                src="{{ asset('img/sintoma6.png')}}" alt="sintoma6"
                                                style="margin: 10px 5px;"><img src="{{ asset('img/sintoma7.png')}}"
                                                alt="sintoma7" style="margin: 10px 5px;"><img
                                                src="{{ asset('img/sintoma8.png')}}" alt="sintoma8" style="margin: 10px 5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
