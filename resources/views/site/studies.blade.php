@extends('layouts.layout')

@section('content')

    {{ Form::open(['url' => '/form-post']) }}
    <div class="accordion" id="accordionExample">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $id[0]->id}}" class="form-control" name="id" id="id">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingReporte">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseReporte" aria-expanded="true" aria-controls="collapseReporte">
                    REPORTE
                </button>
            </h2>
            <div id="collapseReporte" class="accordion-collapse collapse show" aria-labelledby="headingReporte"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Paises en tránsito en los últimos tres meses:</label>
                            <input onclick="validaciones()" type="number" required min="0" max="20" value="0" class="form-control" name="ptmeses" id="ptmeses"
                                >
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Fecha de ingreso a México:</label>
                            <button type="button" class="btn btn-clipboard btn-secondary rounded-circle"
                                data-toggle="tooltip" data-placement="top"
                                title="Fecha en que ingresaste a México en los últimos 3 meses">
                                ?
                            </button>
                            <input type="date" class="form-control" required min={{ $hoy2 }} max={{ $hoy }}
                                name="fingmexico" id="fingmexico">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    DATOS CLÍNICOS
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{-- <form method="POST" action="http://localhost/ludimug/public/form-post"> --}}
                    <div class="row">

                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Servicio de ingreso</label>
                            <input type="text" required value="Prueba COVID-19" class="form-control" name="singreso" id="singreso"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Tipo de paciente</label>
                            <input type="text" required value="Ambulatorio" class="form-control" name="tpaciente" id="tpaciente"
                                readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="inputCity" class="form-label">Fecha de inicio síntomas</label>
                            <button type="button" class="btn btn-clipboard btn-secondary rounded-circle"
                                data-toggle="tooltip" data-placement="top"
                                title="Fecha en que presentaste síntomas en los últimos 15 días">
                                ?
                            </button>
                            <input type="date" class="form-control" min={{ $twoweeks }} max={{ $hoy }}
                                name="finisintomas" required id="finisintomas">
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <label for="inputCity" class="form-label">
                            <h5>
                                A partir de la fecha de inicio de
                                síntomas:
                            </h5>
                        </label>
                    </div>
                    <div class="position-relative">
                        <div class="toast bg-danger text-white fade position-absolute top-50 start-50 translate-middle" id="myToast">
                            <div class="toast-header">
                                <strong class="me-auto"><i class="bi-gift-fill"></i>Reporte</strong>
                                <small>Error</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                            </div>
                            <div class="toast-body">
                                <a id="error">
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label for="inputCity" class="form-label">
                                        <strong>¿Tiene o ha tenido alguno de los
                                            siguientes signos y síntomas?</strong>
                                    </label>
                                </div>
                            </div>

                            @forelse($sintomas as $row)
                                <div class="row mb-1">
                                    <div class="col-md-5 text-end">
                                        <label for="inputCity" class="form-label">{{ $row->nombre }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input value="0" type="radio" class="btn-check"
                                            name="sintoma[{{ $row->id }}]" autocomplete="off"
                                            id="sintomasi{{ $row->id }}" required oninvalid="receiveError('Falta completar el síntoma {{$row->nombre}}')">
                                        <label class="btn btn-outline-dark"
                                            for="sintomasi{{ $row->id }}">Sí</label>

                                        <input value="1" type="radio" class="btn-check"
                                            name="sintoma[{{ $row->id }}]" autocomplete="off"
                                            id="sintomano{{ $row->id }}" required oninvalid="receiveError('Falta completar el síntoma {{$row->nombre}}')">
                                        <label class="btn btn-outline-warning"
                                            for="sintomano{{ $row->id }}">No</label>
                                    </div>
                                </div>
                            @empty
                            @endforelse


                        </div>
                        
                        <div class="col md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label for="inputCity" class="form-label">
                                        <strong>Co-morbilidad</strong>
                                    </label>
                                </div>
                            </div>
                            @forelse($comorbilidades as $row)
                                <div class="row mb-1">
                                    <div class="col-md-5 text-end>
                                        <label for="
                                        inputCity" class="form-label">{{ $row->nombre }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input value="0" type="radio" class="btn-check"
                                            name="comorbilidad[{{ $row->id }}]" required oninvalid="receiveError('Falta completar la co-morbilidad {{$row->nombre}}')" autocomplete="off"
                                            id="comorbilidadsi{{ $row->id }}">
                                        <label class="btn btn-outline-dark"
                                            for="comorbilidadsi{{ $row->id }}">Sí</label>

                                        <input value="1" type="radio" class="btn-check"
                                            name="comorbilidad[{{ $row->id }}]" required oninvalid="receiveError('Falta completar la co-morbilidad {{$row->nombre}}')" autocomplete="off"
                                            id="comorbilidadno{{ $row->id }}" >
                                        <label class="btn btn-outline-warning"
                                            for="comorbilidadno{{ $row->id }}">No</label>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            <div class="row mt-1">
                                <div class="col-md-8">
                                    <label for="inputCity" class="form-label">Específique otros:</label>
                                    <input type="text" value="" class="form-control" required name="co_m_otros" id="co_m_otros">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label for="inputCity" class="form-label">
                                        <strong>Otros síntomas</strong>
                                    </label>
                                </div>
                            </div>
                            @forelse($o_sintomas as $row)
                                <div class="row mb-1">
                                    <div class="col-md-5 text-end">
                                        <label for="inputCity" class="form-label">{{ $row->nombre }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input value="0" type="radio" class="btn-check"
                                            name="osintoma[{{ $row->id }}]" required oninvalid="receiveError('Falta completar el síntoma (otro) {{$row->nombre}}')" autocomplete="off"
                                            id="osintomasi{{ $row->id }}">
                                        <label class="btn btn-outline-dark"
                                            for="osintomasi{{ $row->id }}">Sí</label>

                                        <input value="1" type="radio" class="btn-check"
                                            name="osintoma[{{ $row->id }}]" required oninvalid="receiveError('Falta completar el síntoma (otro) {{$row->nombre}}')" autocomplete="off"
                                            id="osintomano{{ $row->id }}">
                                        <label class="btn btn-outline-warning"
                                            for="osintomano{{ $row->id }}">No</label>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>

                        <div class="col md-6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    TRATAMIENTO
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">¿Desde el inicio de los síntomas ha recibido
                                tratamiento con antipiréticos?</label>
                            <select class="form-control" name="p_tantipireticos" id="p_tantipireticos"
                                aria-label="Default select example" required>
                                <option selected disabled value="">Seleccionar...</option>
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">¿Desde el inicio de los síntomas ha recibido
                                tratamiento con antivirales?</label>
                            <select class="form-control" name="p_tantiviral" onclick="mostrar()" id="p_tantiviral"
                                aria-label="Default select example" required>
                                <option selected disabled value="">Seleccionar...</option>
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                    </div>
                    <div id="pantiviral" style="display: none">
                        <div class="row mt-3">
                            <div class="col-md-6" id="divantiviral">
                                <label for="inputAntiviral" class="form-label">Seleccione antiviral</label>
                                <select class="form-control" name="tantiviral" id="tantiviral"
                                    aria-label="Default select example" onclick="mostraroantiviral()">
                                    <option selected disabled value="">Seleccionar...</option>
                                    <option value="Amantadina">Amantadina</option>
                                    <option value="Rimantadina">Rimantadina</option>
                                    <option value="Oseltamivir">Oseltamivir</option>
                                    <option value="Zanamivivir">Zanamivivir</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="col-md-3" id="divoantv" style="display: none">
                                <label for="inputCity" class="form-label">Otro:</label>
                                <input type="text" required value="NA" class="form-control" name="oantiviral" id="oantiviral">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">¿Cuándo se inicio el tratamiento antiviral?
                                </label>
                                <button type="button" class="btn btn-clipboard btn-secondary rounded-circle"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Fecha en que se inció el tratamiento antiviral en los últimos 15 días">
                                    ?
                                </button>
                                <input type="date" class="form-control" min={{ $twoweeks }} max={{ $hoy }}
                                    name="fecha_tantiviral" id="fecha_tantiviral">
                            </div>
                        </div>

                        {{-- </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="inputCity" class="form-label">
                                <strong>En la unidad médica:</strong>
                            </label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">¿Se inicia tratamiento con
                                antimicrobianos?</label>
                            <input type="text" value="No" class="form-control" name="pum_tantimicrobianos" id="pum_tantimicrobianos" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">¿Se inicia tratamiento con antivirales?</label>
                            <input type="text" value="No" class="form-control" name="pum_tantiviral" id="pum_tantiviral" readonly>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">

                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        ANTECEDENTES EPIDEMIOLÓGICOS
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="inputState" class="form-label">¿Tuvo contacto con casos con enfermedad
                                    respiratoria en las ultimas dos semanas?</label>
                                <select required class="form-control" name="p_cerespiratoria" id="p_cerespiratoria"
                                    aria-label="Default select example">
                                    <option selected disabled value="">Seleccionar...</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <label for="inputState" class="form-label">Durante las semanas previas al inicio de los
                            síntomas
                            tuvo contacto con:</label>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row mt-1">
                                    <div class="col-md-5 text-end">

                                        <label for="inputCity" class="form-label">Aves
                                        </label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="radio" class="btn-check" value="0" name="p_caves" id="avessi"
                                            autocomplete="off" required>
                                        <label class="btn btn-outline-dark"  for="avessi">Sí</label>

                                        <input value="1" type="radio" class="btn-check" name="p_caves" id="avesno"
                                            autocomplete="off" required>
                                        <label class="btn btn-outline-warning"  for="avesno">No</label>
                                    </div>

                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-5 text-end">

                                        <label for="inputCity" class="form-label">Cerdos
                                        </label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="radio" class="btn-check"  value="0" name="p_cerdos" id="cerdossi"
                                            autocomplete="off" required>
                                        <label class="btn btn-outline-dark" for="cerdossi">Sí</label>

                                        <input  type="radio" value="1" class="btn-check" name="p_cerdos" id="cerdosno"
                                            autocomplete="off" required>
                                        <label class="btn btn-outline-warning"  for="cerdosno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="inputCity" class="form-label">Otro animal</label>
                                        <input type="text" value="NA" required class="form-control" name="p_otroanimal" id="p_otroanimal">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12" id="divpviaje">
                                <label for="inputCity" class="form-label">¿Realizó algún viaje 7 días antes del inicio
                                    de signos y síntomas?</label>
                                <select class="form-control" name="p_viaje" id="p_viaje"
                                    aria-label="Default select example" onclick="mostrarp()" required>
                                    <option selected disabled value="" >Seleccionar...</option>
                                    <option value="0">Sí</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                            <div class="col-md-3" id="pais" style="display: none">
                                <label for="inputCity" class="form-label">País</label>
                                <input type="text" value="" class="form-control" name="pais" id="pais">

                            </div>
                            <div class="col-md-3" id="cviaje" style="display: none">
                                <label for="inputCity" class="form-label">Ciudad</label>
                                <input type="text" value="" class="form-control" name="ciudad" id="ciudad">

                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">¿Recibió la vacuna contra influenza en último
                                    año?</label>
                                <select class="form-control" name="pvacuna_influenza" id="pvacuna_influenza"
                                    aria-label="Default select example" onclick="mostrarvinfluenza()" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <option value="0">Sí</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Fecha de vacunación:</label>
                                <input class="form-control" type="date" min="2021-01-01" max=<?php $hoy = date('Y-m-d');
echo $hoy; ?>
                                    name="fvacunacion_influenza" id="fvacunacion_influenza" required>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12" id="divpvacuna">
                                <label for="inputCity" class="form-label">¿Recibió la vacuna contra COVID-19 en último
                                    año?</label>
                                <select class="form-control" name="pvacuna_covid" id="pvacuna_covid"
                                    aria-label="Default select example" onclick="mostrarvacuna()" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <option value="0">Sí</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="mvacuna" style="display: none">
                                <label for="inputCity" class="form-label">Marca la vacuna:</label>
                                <select class="form-control" name="idVacuna" id="idVacuna"
                                    aria-label="Default select example">
                                    <option selected disabled value="">Seleccionar...</option>
                                    @forelse($vacunas as $vacuna)
                                        <option value="{{ $vacuna->id }}">{{ $vacuna->nombre }}</option>
                                        {{-- <option value="AstraZeneca">AstraZeneca</option>
                                <option value="CanSino">CanSino</option>
                                <option value="Moderna">Moderna</option>
                                <option value="Gamaleya 'Sputnik V'">Gamaleya “Sputnik V"</option>
                                <option value="Janssen (Johnson & Johnson)">Janssen (Johnson & Johnson)</option>
                                <option value="Sinopharma">Sinopharma</option>
                                <option value="Novavax">Novavax</option>
                                <option value="No recuerda">No recuerda</option> --}}
                                    @empty
                                        <option value="">No hay datos</option>
                                    @endforelse
                                </select>

                            </div>
                        </div>
                        <div class="row mt-3" style="display: none" id="ndosisdiv">
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">¿Cuántas dosis recibió?</label>
                                <select class="form-control" name="dosis_covid" id="dosis_covid"
                                    aria-label="Default select example" onclick="numerodosis()">
                                    <option selected disabled value="">Seleccionar...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>

                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">Fecha de vacunación (1era dosis):</label>
                                <input class="form-control" type="date" min="2021-01-01" max=<?php $hoy = date('Y-m-d');
echo $hoy; ?>
                                    name="fecha_pdosis" id="fecha_pdosis">

                            </div>
                            <div class="col-md-4" style="display: none" id="fechavac2div">
                                <label for="inputCity" class="form-label">Fecha de vacunación (2da dosis):</label>
                                <input class="form-control" type="date" min="2021-01-01" max=<?php $hoy = date('Y-m-d');
echo $hoy; ?>
                                    name="fecha_sdosis" id="fecha_sdosis">

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            {{-- <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    MUESTRA DE LABORATORIO PARA PCR
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                </div>
            </div>
        </div> --}}
        </div>
        <br>
        <div class="d-grid gap-2">

            {{ Form::submit('GUARDAR', ['class' => 'btn btn-success']) }}
        </div>
        {{ Form::close() }}
        <form hidden method="POST" action="http://localhost/ludimug/public/form-post">
            {{ csrf_field() }}
            <input type="radio" class="btn-check" name="skills[c]" id="success-outlined" autocomplete="off">
            <label class="btn btn-outline-dark" for="success-outlined">Sí</label>

            <input value="" type="radio" class="btn-check" name="skills[c]" id="danger-outlined" autocomplete="off">
            <label class="btn btn-outline-warning" for="danger-outlined">No</label>
        </form>
        {{-- <input type="radio" class="btn-check" name="skills[c]" id="success-outlined" autocomplete="off">
            <label class="btn btn-outline-danger" for="success-outlined">Sí</label>

            <input value="" type="radio" class="btn-check" name="skills[c]" id="danger-outlined" autocomplete="off">
            <label class="btn btn-outline-success" for="danger-outlined">No</label> --}}


        {{-- <button class="btn btn-warning" onclick="test()">Confirmar</button> --}}
    @endsection
