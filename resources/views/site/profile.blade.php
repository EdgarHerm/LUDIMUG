@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{ Html::ul($errors->all()) }}
                {{ Form::open(['url' => '/profile']) }}
                <div class="card-body">
                    <h5 class="card-title">Completar perfil</h5>

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
                                            {{ Form::label('email', 'Correo electrónico', ['class' => 'form-label']) }}
                                            {{ Form::email('email', Request::old('email'), ['class' => 'form-control', 'required' => true]) }}
                                            <label for="inputCity" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" name="apellidop" id="apellidop"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" name="apellidom" id="apellidom"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputZip" class="form-label">Nombre (s)</label>
                                            <input type="text" class="form-control" name="nombres" id="nombres" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="inputAddress" class="form-label">Fecha de
                                                nacimiento</label>
                                            <input type="date" class="form-control" name="fechanac" id="fechanac"
                                                required>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="inputState" class="form-label">CURP</label>
                                            <input type="text" class="form-control" id="curp" name="curp" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputAddress" class="form-label">Sexo</label>
                                            <select class="form-control" name="sexo" id="sexo"
                                                aria-label="Default select example" required>
                                                <option selected>Seleccionar...</option>
                                                <option value="H">Hombre</option>
                                                <option value="M">Mujer</option>
                                                <option value="O">Prefiero no específicar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="inputAddress" class="form-label">Nacionalidad</label>
                                            <select class="form-control" name="nacionalidad" id="nacionalidad"
                                                aria-label="Default select example" required>
                                                <option selected>Seleccionar...</option>
                                                <option value="Mexicana">Mexicana</option>
                                                <option value="Extranjera">Extranjera</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">País de
                                                nacionalidad</label>
                                            <input type="text" name="pnacionalidad" id="pnacionalidad"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputState" class="form-label">País de origen</label>
                                            <input type="text" name="porigen" id="porigen" class="form-control" required>
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
                                        <div class="col-md-2">
                                            <label for="inputState" class="form-label">País de
                                                nacimiento</label>
                                            <input type="text" min="0" max="100" class="form-control" id="inputCity"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="inputAddress" class="form-label">Teléfono Celular</label>
                                            <input type="text" name="telefonoc" class="form-control" id="inputCity"
                                                required>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="inputState" class="form-label">Ocupación</label>
                                            <select class="form-control" name="ocupacion" id="ocupacion"
                                                aria-label="Default select example" required>
                                                <option selected>Seleccionar...</option>
                                                <option value="Estudiante">Estudiante</option>
                                                <option value="Empleado">Empleado</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputState" class="form-label">NUA o NUE</label>
                                            <input type="number" min="0" max="9999" class="form-control" id="nuae"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">¿Pertenece a alguna
                                                institución educativa?</label>
                                            <input type="text" class="form-control" name="inseducativa" id="inseducativa"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">¿Se reconoce cómo índigena?
                                            </label>
                                            <select class="form-control" name="pindigena" id="pindigena"
                                                aria-label="Default select example" required>
                                                <option selected>Seleccionar...</option>
                                                <option value="Sí">Sí</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">¿Habla alguna lengua
                                                índigena? </label>
                                            <select class="form-control" name="lindigena" id="lindigena"
                                                aria-label="Default select example" required>
                                                <option selected>Seleccionar...</option>
                                                <option value="Sí">Sí</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    </form>
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
                                    <form class="row g-3">
                                        <div class="row mt-3">

                                            <div class="col-md-4">
                                                <label for="inputState" class="form-label">Entidad federativa de
                                                    nacimiento</label>
                                                <input type="text" name="efednac" class="form-control" id="efednac"
                                                    required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputState" class="form-label">Entidad de
                                                    residencia</label>
                                                <input type="text" name="eresidencia" class="form-control"
                                                    id="eresidencia" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputState" class="form-label">Municipio de
                                                    residencia</label>
                                                <input type="text" name="mresidencia" class="form-control"
                                                    id="mresidencia" required>
                                            </div>


                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="inputState" class="form-label">Localidad</label>
                                                <input type="text" name="localidad" class="form-control" id="localidad"
                                                    required>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="inputState" class="form-label">Calle</label>
                                                <input type="text" name="calle" class="form-control" id="calle" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputState" class="form-label">Número</label>
                                                <input type="text" name="numero" class="form-control" id="numero"
                                                    required>
                                            </div>


                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <label for="inputState" class="form-label">Entre calle no. 1</label>
                                                <input type="text" name="calle1" class="form-control" id="calle1"
                                                    required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="inputState" class="form-label">Entre calle no. 2</label>
                                                <input type="text" name="calle2" class="form-control" id="calle2"
                                                    required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputAddress" class="form-label">Colonia</label>
                                                <input type="text" class="form-control" name="colonia" id="colonia"
                                                    required>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="inputAddress" class="form-label">C.P</label>
                                                <input type="text" class="form-control" name="cp" id="cp" required>
                                            </div>


                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-success">Guardar</button>
                    </div>


                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
