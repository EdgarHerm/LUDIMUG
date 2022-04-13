@extends('layouts.layout')

@section('content')
    @if (Html::ul($errors->all()))
        <div class="alert alert-success" role="alert">
            {{ Html::ul($errors->all()) }}
        </div>
    @endif
    @if (isset($reportes))
    @else
        <div class="alert alert-danger" role="alert">
            Por favor termina de llenar tu perfil.
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="card-title text-center">REPORTE - EVOLUCIÓN
                    </h3>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    DETALLES DEL REPORTE
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="inputZip" class="form-label">Folio</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->folio : '' }}"
                                                class="form-control" name="folio" id="folio" readonly xyz>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputCity" class="form-label">Ocupación</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->ocupacion : '' }}"
                                                class="form-control" name="ocupacion" id="ocupacion" xyz readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputCity" class="form-label">NUA o NUE</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->nuae : '' }}"
                                                class="form-control" name="nuae" id="nuae" xyz readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Fecha de elaboración</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0])? \Carbon\Carbon::parse(strtotime($reportes[0]->ftmuestra))->formatLocalized('%d %B %Y'): '' }}"
                                                class="form-control" name="felaboracion" id="felaboracion" xyz readonly>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="inputCity" class="form-label">Apellido Paterno</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->apellidop : '' }}"
                                                class="form-control" name="apellidop" id="apellidop" xyz readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Apellido Materno</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->apellidom : '' }}"
                                                class="form-control" name="apellidom" id="apellidom" xyz readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputZip" class="form-label">Nombre (s)</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->nombres : '' }}"
                                                class="form-control" name="nombres" id="nombres" readonly xyz>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">CURP</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->CURP : '' }}"
                                                maxlength="18" class="form-control" id="curp" name="curp" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputAddress" class="form-label">Sexo</label>
                                            @if ($reportes[0]->sexo == 'H')
                                                <input type="text" class="form-control" name="sexo" id="sexo"
                                                    aria-label="Default select example" readonly
                                                    value="{{ !empty($reportes[0]) ? 'Masculino' : '' }}"
                                                    {{ !empty($reportes[0]) ? 'Masculino' : '' }}>
                                            @endif
                                            @if ($reportes[0]->sexo == 'M')
                                                <input type="text" class="form-control" name="sexo" id="sexo"
                                                    aria-label="Default select example" readonly
                                                    value="{{ !empty($reportes[0]) ? 'Femenino' : '' }}"
                                                    {{ !empty($reportes[0]) ? 'Femenino' : '' }}>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputAddress" class="form-label">Teléfono Celular</label>
                                            <input type="text"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->telefonoc : '' }}"
                                                name="telefonoc" class="form-control" id="inputCity" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{ Form::open(['url' => '/evolucion']) }}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingAddress">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseAddress" aria-expanded="true" aria-controls="collapseAddress">
                                    REGISTRAR EVOLUCIÓN
                                </button>
                            </h2>
                            <div id="collapseAddress" class="accordion-collapse collapse show"
                                aria-labelledby="headingAddress" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row mt-3">

                                        <div class="row mt-3" style="display: none">
                                            <div class="col-md-4">
                                                <label for="inputCity" class="form-label">Apellido Paterno</label>
                                                <input type="text"
                                                    value="{{ !empty($reportes[0]) ? $reportes[0]->apellidop : '' }}"
                                                    class="form-control" name="apellidop" id="apellidop" xyz readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputState" class="form-label">Apellido Materno</label>
                                                <input type="text"
                                                    value="{{ !empty($reportes[0]) ? $reportes[0]->apellidom : '' }}"
                                                    class="form-control" name="apellidom" id="apellidom" xyz readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputZip" class="form-label">Nombre (s)</label>
                                                <input type="text"
                                                    value="{{ !empty($reportes[0]) ? $reportes[0]->nombres : '' }}"
                                                    class="form-control" name="nombres" id="nombres" readonly xyz>
                                            </div>
                                        </div>
                                        <input type="text" style="display: none"
                                        value="{{ !empty($reportes[0]) ? $reportes[0]->email : '' }}"
                                        class="form-control" name="email" id="email" readonly xyz>
                                
                                        <input type="text" style="display: none"
                                                value="{{ !empty($reportes[0]) ? $reportes[0]->id : '' }}"
                                                class="form-control" name="id" id="id" xyz>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Evolución</label>
                                            <select class="form-select" name="evolucion" id="evolucion"
                                                aria-label="Default select example">
                                                <option selected value="Caso no grave">Caso no grave</option>
                                                <option value="Alta">Alta</option>
                                                <option value="En Tratamiento">En Tratamiento</option>
                                                <option value="Caso grave">Caso grave</option>
                                                <option value="Caso grave">Defunción</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Resultado</label>
                                            <select class="form-select" name="resultado" id="resultado"
                                                aria-label="Default select example">
                                                <option selected disabled value="Caso no grave">Seleccionar...</option>
                                                <option value="Positivo">Positivo</option>
                                                <option value="Negativo">Negativo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">

                            {{ Form::submit('GUARDAR', ['class' => 'btn btn-success']) }}
                        </div>
                        {{ Form::close() }}
                    </div>

                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
