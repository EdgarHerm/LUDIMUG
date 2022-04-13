@extends('layouts.layout')

@section('content')
    @if (Html::ul($errors->all()))
        <div class="alert alert-success" role="alert">
            {{ Html::ul($errors->all()) }}
        </div>
    @endif
    @if (isset($user_profile))
    @else
        <div class="alert alert-danger" role="alert">
            Por favor termina de llenar tu perfil.
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                {{ Form::open(['url' => '/profile']) }}
                <div class="card-body">

                    @if (isset($user_profile))
                    <h3 class="card-title text-center">MI PERFIL</h3>
                    @else
                    <h3 class="card-title text-center" style="color:red">COMPLETAR PERFIL</h3>
                    @endif

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    DATOS GENERALES
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="inputCity" class="form-label">Apellido Paterno</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->apellidop : '' }}"
                                                class="form-control" name="apellidop" id="apellidop" xyz required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Apellido Materno</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->apellidom : '' }}"
                                                class="form-control" name="apellidom" id="apellidom" xyz required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputZip" class="form-label">Nombre (s)</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->nombres : '' }}"
                                                class="form-control" name="nombres" id="nombres" required xyz>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Ocupación</label>
                                            <select class="form-control" name="ocupacion" id="ocupacion"
                                                aria-label="Default select example" required>
                                                <option selected disabled
                                                    value="{{ !empty($user_profile[0]) ? $user_profile[0]->ocupacion : '' }}">
                                                    {{ !empty($user_profile[0]) ? $user_profile[0]->ocupacion : 'Seleccionar...' }}
                                                </option>
                                                <option value="Estudiante">Estudiante</option>
                                                <option value="Empleado">Empleado</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">NUA o NUE</label>
                                            <input value="{{ !empty($user_profile[0]) ? $user_profile[0]->nuae : '' }}"
                                                type="number" min="0" max="99999" name="nuae" class="form-control"
                                                id="nuae" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">¿Pertenece a alguna
                                                institución educativa?</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->inseducativa : '' }}"
                                                class="form-control" name="inseducativa" id="inseducativa" required>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="inputAddress" class="form-label">Fecha de
                                                nacimiento</label>
                                            <input type="date" class="form-control"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->fechanac : '' }}"
                                                min=<?php $hoy2 = date('Y-m-d', strtotime(date('Y-m-d') . '- 90 year'));
                                                echo $hoy2; ?> max=<?php $hoy = date('Y-m-d', strtotime(date('Y-m-d') . '- 17 year'));
echo $hoy; ?> name="fechanac"
                                                id="fechanac" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">CURP</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->CURP : '' }}"
                                                maxlength="18" class="form-control" id="curp" name="curp" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputAddress" class="form-label">Sexo</label>
                                            <select class="form-control" name="sexo" id="sexo"
                                                aria-label="Default select example" required>
                                                <option selected disabled
                                                    value="{{ !empty($user_profile[0]) ? $user_profile[0]->sexo : '' }}">
                                                    {{ !empty($user_profile[0]) ? $user_profile[0]->sexo : 'Seleccionar...' }}
                                                </option>
                                                <option value="H">Hombre</option>
                                                <option value="M">Mujer</option>
                                                <option value="O">Prefiero no específicar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="inputAddress" class="form-label">Teléfono Celular</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->telefonoc : '' }}"
                                                name="telefonoc" class="form-control" id="inputCity" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputCity" class="form-label">¿Se reconoce cómo índigena?
                                            </label>
                                            <select class="form-control" name="pindigena" id="pindigena"
                                                aria-label="Default select example" required>
                                                <option selected disabled
                                                    value="{{ !empty($user_profile[0]) ? $user_profile[0]->pindigena : '' }}">
                                                    {{ !empty($user_profile[0]) ? $user_profile[0]->pindigena : 'Seleccionar...' }}
                                                </option>
                                                <option value="Sí">Sí</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">¿Habla alguna lengua
                                                índigena? </label>
                                            <select class="form-control" name="lindigena" id="lindigena"
                                                aria-label="Default select example" required>
                                                <option selected disabled
                                                    value="{{ !empty($user_profile[0]) ? $user_profile[0]->lindigena : '' }}">
                                                    {{ !empty($user_profile[0]) ? $user_profile[0]->lindigena : 'Seleccionar...' }}
                                                </option>
                                                <option value="Sí">Sí</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="inputAddress" class="form-label">Nacionalidad</label>
                                            <select class="form-control" name="nacionalidad" id="nacionalidad"
                                                aria-label="Default select example" required>
                                                <option selected disabled
                                                    value="{{ !empty($user_profile[0]) ? $user_profile[0]->nacionalidad : '' }}">
                                                    {{ !empty($user_profile[0]) ? $user_profile[0]->nacionalidad : 'Seleccionar...' }}
                                                </option>
                                                <option value="Mexicana">Mexicana</option>
                                                <option value="Extranjera">Extranjera</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="inputState" class="form-label">País de
                                                nacionalidad</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->pnacionalidad : '' }}"
                                                name="pnacionalidad" id="pnacionalidad" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputState" class="form-label">País de origen</label>
                                            <input type="text"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->porigen : '' }}"
                                                name="porigen" id="porigen" class="form-control" required>
                                        </div>
                                        {{-- <div class="col-md-2">
                                                    <label for="inputAddress" class="form-label">¿Es migrante?</label>
                                                    <br>
                                                    <input type="radio" class="form-control btn-check" name="migrante"
                                                        id="warning-outlined" autocomplete="off">
                                                    <label class="btn btn-outline-warning" for="warning-outlined">Sí</label>

                                                    <input value="" type="radio" class="form-control btn-check"
                                                        name="migrante" id="dark-outlined" autocomplete="off">
                                                    <label class="btn btn-outline-dark" for="dark-outlined">No</label>
                                                </div> --}}
                                        <div class="col-md-3">
                                            <label for="inputState" class="form-label">País de
                                                nacimiento</label>
                                            <input type="text" name="pnac"
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->pnac : '' }}"
                                                class="form-control" id="pnac" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingAddress">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseAddress" aria-expanded="true" aria-controls="collapseAddress">
                                    DOMICILIO
                                </button>
                            </h2>
                            <div id="collapseAddress" class="accordion-collapse collapse show"
                                aria-labelledby="headingAddress" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row mt-3">

                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Entidad federativa de
                                                nacimiento</label>
                                            <input
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->efednac : '' }}"
                                                type="text" name="efednac" class="form-control" id="efednac" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Entidad de
                                                residencia</label>
                                            <input
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->eresidencia : '' }}"
                                                type="text" name="eresidencia" class="form-control" id="eresidencia"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Municipio de
                                                residencia</label>
                                            <input
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->mresidencia : '' }}"
                                                type="text" name="mresidencia" class="form-control" id="mresidencia"
                                                required>
                                        </div>


                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Localidad</label>
                                            <input
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->localidad : '' }}"
                                                type="text" name="localidad" class="form-control" id="localidad" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Calle</label>
                                            <input value="{{ !empty($user_profile[0]) ? $user_profile[0]->calle : '' }}"
                                                type="text" name="calle" class="form-control" id="calle" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Número</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">#</span>
                                                <input
                                                    value="{{ !empty($user_profile[0]) ? $user_profile[0]->numero : '' }}"
                                                    type="text" name="numero" class="form-control" id="numero" required>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="inputState" class="form-label">Entre calle no. 1</label>
                                            <input value="{{ !empty($user_profile[0]) ? $user_profile[0]->calle1 : '' }}"
                                                type="text" name="calle1" class="form-control" id="calle1" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputState" class="form-label">Entre calle no. 2</label>
                                            <input value="{{ !empty($user_profile[0]) ? $user_profile[0]->calle2 : '' }}"
                                                type="text" name="calle2" class="form-control" id="calle2" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputAddress" class="form-label">Colonia</label>
                                            <input
                                                value="{{ !empty($user_profile[0]) ? $user_profile[0]->colonia : '' }}"
                                                type="text" class="form-control" name="colonia" id="colonia" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputAddress" class="form-label">C.P</label>
                                            <input value="{{ !empty($user_profile[0]) ? $user_profile[0]->CP : '' }}"
                                                type="text" class="form-control" name="cp" id="cp" required>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2">

                        {{ Form::submit('GUARDAR', ['class' => 'btn btn-success']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
