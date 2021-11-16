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
                            Estatus
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
                        <td>
                            Pediente
                        </td>
                        <td class="bg-warning text-white">
                            Pendiente
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            Edgar Eduardo Rodríguez
                        </td>
                        <td>
                            Los olivos, León GTO
                        </td>
                        <td>
                            Impreso
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
                            José Juan Vallejo Nuñez
                        </td>
                        <td>
                            Valle de señora, León GTO
                        </td>
                        <td>
                            Sin Datos
                        </td>
                        <td class="bg-info text-white">
                            NA
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            José Esteban Landeros Aranda
                        </td>
                        <td>
                            La roncha, León GTO
                        </td>
                        <td>
                            Reportado
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
                            Edgar David Hermosillo Barbosa
                        </td>
                        <td>
                            Diez de Mayo, León GTO
                        </td>
                        <td>
                            Impreso
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
                                <div class="col-md-3">
                                    <label for="inputAddress2" class="form-label">NUE/NUA</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Número de empleado o alumno">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputAddress2" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Introduce tu nombre" value="Edgar David Hermosillo Barbosa" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputAddress2" class="form-label">Puesto</label>
                                    <select class="form-control">
                                        <option selected disabled>Seleccionar...</option>
                                        <option>Alumno</option>
                                        <option>Trabajador</option>
                                        <option>Alumno/Trabajador</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputAddress2" class="form-label">Campus</label>
                                    <select class="form-control">
                                        <option selected disabled>Seleccionar...</option>
                                        <option>León</option>
                                        <option>Guanajuato</option>
                                        <option>Celaya-Salvatierra</option>
                                        <option>Irapuato-Salamanca</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Sede</label>
                                    <select class="form-control">
                                        <option selected disabled>Seleccionar...</option>
                                        <option value="Orquesta Sinfónica">Orquesta Sinfónica</option>
                                        <option value="Colegio de Nivel Medio">Colegio de Nivel Medio</option>
                                        <option value="División de Arquitectura Arte y Diseño (Sede Marfil)">División de
                                            Arquitectura Arte y Diseño (Sede Marfil)</option>
                                        <option value="División de Ciencias e Ingenierías">División de Ciencias e
                                            Ingenierías</option>
                                        <option value="División de Ciencias Económico-Administrativas (DCEA)">División de
                                            Ciencias Económico-Administrativas (DCEA)</option>
                                        <option value="División de Ciencias Sociales y Humanidades">División de Ciencias
                                            Sociales y Humanidades</option>
                                        <option value="División de Derecho, Política y Gobierno">División de Derecho,
                                            Política y Gobierno</option>
                                        <option value="Edificio Central (Dependencias Centrales)">Edificio Central
                                            (Dependencias Centrales)</option>
                                        <option value="ENMS Celaya">ENMS Celaya</option>
                                        <option value="ENMS Centro Histórico">ENMS Centro Histórico</option>
                                        <option value="ENMS Guanajuato">ENMS Guanajuato</option>
                                        <option value="ENMS Irapuato">ENMS Irapuato</option>
                                        <option value="ENMS León">ENMS León</option>
                                        <option value="ENMS Moroleón">ENMS Moroleón</option>
                                        <option value="ENMS Pénjamo">ENMS Pénjamo</option>
                                        <option value="ENMS Salamanca">ENMS Salamanca</option>
                                        <option value="ENMS Salvatierra">ENMS Salvatierra</option>
                                        <option value="ENMS San Luis de la Paz">ENMS San Luis de la Paz</option>
                                        <option value="ENMS Silao">ENMS Silao</option>
                                        <option value="EVIDA">EVIDA</option>
                                        <option value="Mesón de San Antonio">Mesón de San Antonio</option>
                                        <option value="Mutualismo">Mutualismo</option>
                                        <option value="Rectoría de Campus Guanajuato">Rectoría de Campus Guanajuato</option>
                                        <option value="Sede Belén">Sede Belén</option>
                                        <option value="Sede Copal">Sede Copal</option>
                                        <option value="Sede Janicho">Sede Janicho</option>
                                        <option value="Sede Juan Pablo (Campus)">Sede Juan Pablo (Campus)</option>
                                        <option value="Sede Mayorazgo Campus CS">Sede Mayorazgo Campus CS</option>
                                        <option value="Sede Noria Alta">Sede Noria Alta</option>
                                        <option value="Sede Palo Blanco">Sede Palo Blanco</option>
                                        <option value="Sede San Carlos">Sede San Carlos</option>
                                        <option value="Sede Yuriria">Sede Yuriria</option>
                                        <option value="Tierra Blanca">Tierra Blanca</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">División</label>
                                    <select class="form-control">
                                        <option selected disabled>Seleccionar...</option>
                                        <option value="División Ciencias de la Salud e Ingenierías">División Ciencias de la
                                            Salud e Ingenierías</option>
                                        <option value="División Ciencias Sociales y Administrativas">División Ciencias
                                            Sociales y Administrativas</option>
                                        <option value="División de Arquitectura, Arte y Diseño">División de Arquitectura,
                                            Arte y Diseño</option>
                                        <option value="División de Ciencias de la Salud">División de Ciencias de la Salud
                                        </option>
                                        <option value="División de Ciencias e Ingenierías">División de Ciencias e
                                            Ingenierías</option>
                                        <option value="División de Ciencias Económico - Administrativas">División de
                                            Ciencias Económico - Administrativas</option>
                                        <option value="División de Ciencias Naturales y Exactas">División de Ciencias
                                            Naturales y Exactas</option>
                                        <option value="División de Ciencias Sociales y Humanidades">División de Ciencias
                                            Sociales y Humanidades</option>
                                        <option value="División de Derecho, Política y Gobierno">División de Derecho,
                                            Política y Gobierno</option>
                                        <option value="División de Ingenierías">División de Ingenierías</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Departamento</label>
                                    <select class="form-control">
                                        <option selected disabled>Seleccionar...</option>
                                        
                                        <option value="Departamento de Arquitectura">Departamento de Arquitectura</option>
                                        <option value="Departamento de Artes Visuales">Departamento de Artes Visuales
                                        </option>
                                        <option value="Departamento de Astronomía">Departamento de Astronomía</option>
                                        <option value="Departamento de Biología">Departamento de Biología</option>
                                        <option value="Departamento de Derecho">Departamento de Derecho</option>
                                        <option value="Departamento de Diseño">Departamento de Diseño</option>
                                        <option value="Departamento de Economía y Finanzas">Departamento de Economía y
                                            Finanzas</option>
                                        <option value="Departamento de Educación">Departamento de Educación</option>
                                        <option value="Departamento de Estudios de Cultura y Sociedad">Departamento de
                                            Estudios de Cultura y Sociedad</option>
                                        <option value="Departamento de Estudios Organizacionales">Departamento de Estudios
                                            Organizacionales</option>
                                        <option value="Departamento de Estudios Políticos y de Gobierno">Departamento de
                                            Estudios Políticos y de Gobierno</option>
                                        <option value="Departamento de Farmacia">Departamento de Farmacia</option>
                                        <option value="Departamento de Filosofía">Departamento de Filosofía</option>
                                        <option value="Departamento de Gestión Pública">Departamento de Gestión Pública
                                        </option>
                                        <option value="Departamento de Gestión y Dirección de Empresas">Departamento de
                                            Gestión y Dirección de Empresas</option>
                                        <option value="Departamento de Historia">Departamento de Historia</option>
                                        <option value="Departamento de Ingeniería Civil">Departamento de Ingeniería Civil
                                        </option>
                                        <option value="Departamento de Ingeniería en Minas, Metalurgía y Geología">
                                            Departamento de Ingeniería en Minas, Metalurgía y Geología</option>
                                        <option value="Departamento de Ingeniería Geomática e Hidráulica">Departamento de
                                            Ingeniería Geomática e Hidráulica</option>
                                        <option value="Departamento de Ingeniería Química">Departamento de Ingeniería
                                            Química</option>
                                        <option value="Departamento de Lenguas">Departamento de Lenguas</option>
                                        <option value="Departamento de Letras Hispánicas">Departamento de Letras Hispánicas
                                        </option>
                                        <option value="Departamento de Matemáticas">Departamento de Matemáticas</option>
                                        <option value="Departamento de Medicina y Nutrición">Departamento de Medicina y
                                            Nutrición</option>
                                        <option value="Departamento de Música">Departamento de Música</option>
                                        <option value="Departamento de Química">Departamento de Química</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Carrera</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Introduce tu carrera">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="inputAddress2"
                                        placeholder="Introduce tu carrera">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress" class="form-label">Fecha de notificación en
                                        plataforma</label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                

                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion-item">
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
                </div> --}}
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
            {{-- <input type="radio" class="btn-check" name="skills[c]" id="success-outlined" autocomplete="off">
            <label class="btn btn-outline-danger" for="success-outlined">Sí</label>

            <input value="" type="radio" class="btn-check" name="skills[c]" id="danger-outlined" autocomplete="off">
            <label class="btn btn-outline-success" for="danger-outlined">No</label> --}}


        </div>
    </div>

@endsection
