@extends('layouts.layout')

@section('content')
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">Listado</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Nuevo Registro</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active justify-content-center" id="pills-home" role="tabpanel"
            aria-labelledby="pills-home-tab">
            <table class="table table-striped table-hover" id="reportTable">
                <thead>
                    <tr>
                        <th>
                            # No.
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Dirección
                        </th>
                        <th>
                            Resultado
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            5
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            7
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            8
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            9
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            10
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            11
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            12
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-success text-white">
                            Negativo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            13
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            14
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            15
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            16
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            17
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            18
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            19
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-danger text-white">
                            Positivo
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            20
                        </td>
                        <td>
                            Juan Ignacio Peréz Ramírez
                        </td>
                        <td>
                            Villa Olímpica, León GTO
                        </td>
                        <td class="bg-success text-white">
                            Negativo
                        </td>
                        <td>

                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="tab-pane fade justify-content-center" id="pills-profile" role="tabpanel"
            aria-labelledby="pills-profile-tab">

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
                                <div class="col-md-6">
                                    <label for="exampleDataList" class="form-label">Nombre de la unidad:</label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                                        placeholder="Buscar...">
                                    <datalist id="datalistOptions">
                                        <option value="1">San Francisco
                                        <option value="New York">
                                        <option value="Seattle">
                                        <option value="Los Angeles">
                                        <option value="Chicago">
                                    </datalist>
                                </div>
                                <div class="col-md-5">
                                    <label for="inputPassword4" class="form-label">NUE</label>
                                    <input class="form-control" list="datalistOptions2" id="exampleDataList2"
                                        placeholder="Buscar...">
                                    <datalist id="datalistOptions2">
                                        <option value="789818">
                                        <option value="266479">
                                        <option value="312659">
                                        <option value="998948">
                                        <option value="498798">
                                    </datalist>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success mt-4"><i
                                            class="fas fa-search"></i></button>
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress" class="form-label">Fecha de notificación en
                                        plataforma</label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress2" class="form-label">Folio plataforma</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Introduce el folio">
                                </div>
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
                                <div class="col-4">
                                    <label for="inputAddress" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                <div class="col-3">
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
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">¿Está embarazada?</label>
                                    <select class="form-control" aria-label="Default select example">
                                        <option selected>Seleccionar...</option>
                                        <option value="Sí">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputState" class="form-label">Meses de embarazo</label>
                                    <input type="number" min="0" max="9" class="form-control" id="inputCity">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">¿Se encuentra en estado de
                                        puerperio?</label>
                                    <select class="form-control" aria-label="Default select example">
                                        <option selected>Seleccionar...</option>
                                        <option value="Sí">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputState" class="form-label">Días de puerperio</label>
                                    <input type="number" min="0" max="100" class="form-control" id="inputCity">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">Nacionalidad</label>
                                    <select class="form-control" aria-label="Default select example">
                                        <option selected>Seleccionar...</option>
                                        <option value="Mexicana">Mexicana</option>
                                        <option value="Extranjera">Extranjera</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            DATOS CLÍNICOS
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            TRATAMIENTO
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            ANTECEDENTES EPIDEMIOLÓGICOS
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            MUESTRA PARA ANTÍGENO DE COVID-19
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            MUESTRA DE LABORATORIO PARA PCR
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            EVOLUCIÓN
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <form hidden method="POST" action="http://localhost/ludimug/public/form-post">
                {{ csrf_field() }}
                <div class="row">
                    <input type="radio" name="skills[a]" value="[0,1]">PHP</br>
                    <input type="radio" name="skills[a]" value="mysql">MySQL</br>
                </div>

                <input type="radio" name="skills[b]" value="javascript">JavaScript</br>
                <input type="radio" name="skills[b]" value="laravel">Laravel</br>
                <input type="submit">
            </form>
            <input type="radio" class="btn-check" name="skills[c]" id="success-outlined" autocomplete="off">
            <label class="btn btn-outline-danger" for="success-outlined">Sí</label>

            <input value="" type="radio" class="btn-check" name="skills[c]" id="danger-outlined" autocomplete="off">
            <label class="btn btn-outline-success" for="danger-outlined">No</label>


        </div>
        <button class="btn btn-warning" onclick="test()">Confirmar</button>
    </div>

@endsection
