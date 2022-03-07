@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Completar perfil</h5>
                    <form>
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
                                        <form class="row g-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="inputCity" class="form-label">Apellido Paterno</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">Apellido Materno</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputZip" class="form-label">Nombre (s)</label>
                                                    <input type="text" class="form-control" id="inputZip">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label for="inputAddress" class="form-label">Fecha de
                                                        nacimiento</label>
                                                    <input type="date" class="form-control" id="inputAddress"
                                                        placeholder="1234 Main St">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="inputAddress" class="form-label">Sexo</label>
                                                    <select class="form-control" aria-label="Default select example">
                                                        <option selected>Seleccionar...</option>
                                                        <option value="Hombre">Hombre</option>
                                                        <option value="Mujer">Mujer</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="inputState" class="form-label">CURP</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingAddress">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseAddress" aria-expanded="true"
                                        aria-controls="collapseAddress">
                                        DOMICILIO
                                    </button>
                                </h2>
                                <div id="collapseAddress" class="accordion-collapse collapse show"
                                    aria-labelledby="headingAddress" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="row g-3">
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <label for="inputAddress" class="form-label">Nacionalidad</label>
                                                    <select class="form-control" aria-label="Default select example">
                                                        <option selected>Seleccionar...</option>
                                                        <option value="Mexicana">Mexicana</option>
                                                        <option value="Extranjera">Extranjera</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">País de
                                                        nacionalidad</label>
                                                    <input type="text" min="0" max="100" class="form-control"
                                                        id="inputCity">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="inputState" class="form-label">País de origen</label>
                                                    <input type="text" min="0" max="100" class="form-control"
                                                        id="inputCity">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="inputAddress" class="form-label">¿Es migrante?</label>
                                                    <br>
                                                    <input type="radio" class="form-control btn-check" name="skills[c]"
                                                        id="warning-outlined" autocomplete="off">
                                                    <label class="btn btn-outline-warning" for="warning-outlined">Sí</label>

                                                    <input value="" type="radio" class="form-control btn-check"
                                                        name="skills[c]" id="dark-outlined" autocomplete="off">
                                                    <label class="btn btn-outline-dark" for="dark-outlined">No</label>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label for="inputState" class="form-label">País de
                                                        nacimiento</label>
                                                    <input type="text" min="0" max="100" class="form-control"
                                                        id="inputCity">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="inputState" class="form-label">Entidad federativa de
                                                        nacimiento</label>
                                                    <input type="text" min="0" max="100" class="form-control"
                                                        id="inputCity">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="inputState" class="form-label">Código Postal</label>
                                                    <input type="text" min="0" onkeyup="getData()" max="100"
                                                        class="form-control" id="zipcode">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="inputState" class="form-label">Entidad de
                                                        residencia</label>
                                                    <input type="text" min="0" max="100" class="form-control"
                                                        id="entityResidence">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="inputState" class="form-label">Municipio de
                                                        residencia</label>
                                                    <input type="text" min="0" max="100" class="form-control"
                                                        id="inputCity">
                                                </div>

                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <label for="inputState" class="form-label">Localidad</label>
                                                    <input type="text" min="0" max="100" class="form-control"
                                                        id="inputCity">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="inputAddress" class="form-label">Colonia</label>
                                                    <select class="form-control" id="places"
                                                        aria-label="Default select example">
                                                        <option selected>Seleccionar...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-success">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
