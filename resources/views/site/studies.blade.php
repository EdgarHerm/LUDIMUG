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
            aria-labelledby="pills-profile-tab">Hola2
        </div>
    </div>

@endsection
