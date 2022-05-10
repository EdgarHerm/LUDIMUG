<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tratamiento;
use App\Models\DatosClinicos;
use App\Models\DatosClinicosComorbilidades;
use App\Models\DatosClinicosSintomas;
use App\Models\DatosClinicosOSintomas;
use App\Models\AntecedentesEpidemiologicos;
use App\Models\Reporte;
use Carbon\Carbon;
use Auth;

class StudiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sqlP =
            'SELECT persona.id FROM persona INNER JOIN users ON users.id = persona.id WHERE users.id =' .
            Auth::user()->id;
        $id = Db::select($sqlP);

        $sql4 = 'SELECT * FROM vacunas';
        $vacunas = Db::select($sql4);

        $sql = 'SELECT * FROM sintomas';
        $sintomas = Db::select($sql);

        $sql1 = 'SELECT * FROM comorbilidades';
        $comorbilidades = Db::select($sql1);

        $sql2 = 'SELECT * FROM o_sintomas';
        $o_sintomas = Db::select($sql2);

        $hoy = date('Y-m-d');
        $hoy2 = date('Y-m-d', strtotime(date('Y-m-d') . '- 3 month'));
        $twoweeks = date('Y-m-d', strtotime(date('Y-m-d') . '- 2 week'));

        return view(
            'site.studies',
            compact(
                'hoy2',
                'hoy',
                'twoweeks',
                'sintomas',
                'comorbilidades',
                'o_sintomas',
                'vacunas',
                'id'
            )
        );
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function radios(Request $request)
    {
        // echo dd($request->all());
        try {
            $array = $request->sintoma;
            $array = array_map(function ($value) {
                return intval($value);
            }, $array);

            $arrayc = $request->comorbilidad;
            $arrayc = array_map(function ($value) {
                return intval($value);
            }, $arrayc);

            $arrayos = $request->osintoma;
            $arrayos = array_map(function ($value) {
                return intval($value);
            }, $arrayos);

            Db::beginTransaction();

            $dclinicos = new DatosClinicos();

            $dclinicos->singreso = $request->singreso;
            $dclinicos->tpaciente = $request->tpaciente;
            $dclinicos->fingreso = date('Y-m-d');
            $dclinicos->finisintomas = $request->finisintomas;
            $dclinicos->co_m_otros = $request->co_m_otros;
            $dclinicos->d_probable = 'Enfermedad tipo influenza (ETI)';
            $dclinicos->save();

            // echo var_dump($request->sintoma);
            // echo var_dump($array);

            for ($i = 1; $i <= count($array); $i++) {
                $dcsintomas = new DatosClinicosSintomas();
                $dcsintomas->idDClinicos = $dclinicos->id;
                //echo $array[$i] . '<br>';
                $dcsintomas->idSintoma = $i;
                $dcsintomas->estatus = $array[$i];
                $dcsintomas->save();
            }

            // echo var_dump($request->sintoma);
            // echo var_dump($array);

            for ($i = 1; $i <= count($arrayc); $i++) {
                $dccomorbilidad = new DatosClinicosComorbilidades();
                //echo $array[$i] . '<br>';
                $dccomorbilidad->idDClinicos = $dclinicos->id;
                $dccomorbilidad->idComorbilidad = $i;
                $dccomorbilidad->estatus = $array[$i];
                $dccomorbilidad->save();
            }

            // echo var_dump($request->sintoma);
            // echo var_dump($array);

            for ($i = 1; $i <= count($arrayos); $i++) {
                $dcosintomas = new DatosClinicosOSintomas();
                $dcosintomas->idDClinicos = $dclinicos->id;
                //echo $array[$i] . '<br>';
                $dcosintomas->idOSintoma = $i;
                $dcosintomas->estatus = $array[$i];
                $dcosintomas->save();
            }

            $tratamiento = new Tratamiento();
            //echo dd($tratamiento);
            $tratamiento->p_tantipireticos = $request->p_tantipireticos;
            $tratamiento->p_tantiviral = $request->p_tantiviral;
            if ($request->p_tantiviral == 'Si') {
                $tratamiento->tantiviral = $request->tantiviral;
                $tratamiento->oantiviral = $request->oantiviral;
                $tratamiento->fecha_tantiviral = $request->fecha_tantiviral;
            } else {
                $tratamiento->tantiviral = null;
                $tratamiento->oantiviral = null;
                $tratamiento->fecha_tantiviral = null;
            }

            $tratamiento->pum_tantimicrobianos = 1;
            $tratamiento->pum_tantiviral = 1;
            $tratamiento->pum_tipoantiviral = 'NA';

            $tratamiento->save();

            $antepidemio = new AntecedentesEpidemiologicos();
            $antepidemio->p_cerespiratoria = $request->p_cerespiratoria;
            $antepidemio->p_caves = $request->p_caves;
            $antepidemio->p_cerdos = $request->p_cerdos;
            $antepidemio->p_otroanimal = $request->p_otroanimal;
            $antepidemio->p_viaje = $request->p_viaje;
            if ($request->p_viaje == 'Si') {
                $antepidemio->pais = $request->pais;
                $antepidemio->ciudad = $request->ciudad;
            } else {
                $antepidemio->pais = null;
                $antepidemio->ciudad = null;
            }

            $antepidemio->pvacuna_influenza = $request->pvacuna_influenza;
            if ($request->pvacuna_influenza == 'Si') {
                $antepidemio->fvacunacion_influenza =
                    $request->fvacunacion_influenza;
            } else {
                $antepidemio->fvacunacion_influenza = null;
            }

            $antepidemio->pvacuna_covid = $request->pvacuna_covid;
            if ($request->pvacuna_covid == 'Si') {
                $antepidemio->dosis_covid = $request->dosis_covid;
                if ($request->dosis_covid == 1) {
                    $antepidemio->fecha_pdosis = $request->fecha_pdosis;
                    $antepidemio->fecha_sdosis = null;
                } else {
                    $antepidemio->fecha_pdosis = $request->fecha_pdosis;
                    $antepidemio->fecha_sdosis = $request->fecha_sdosis;
                }
            } else {
                $antepidemio->dosis_covid = 0;
                $antepidemio->fecha_pdosis = null;
                $antepidemio->fecha_sdosis = null;
            }
            $antepidemio->idVacuna = $request->idVacuna;

            $antepidemio->save();

            $reporte = new Reporte();
            $reporte->unidad = 'LUDIMUG';
            $reporte->ptmeses = $request->ptmeses;
            $reporte->fingmexico = $request->fingmexico;
            $reporte->mpcr = 'Sí';
            $reporte->rmuestra = 'Pendiente';
            $reporte->tmuestra = 'SALIVA';
            $reporte->ftmuestra = date('Y-m-d');
            $reporte->resultadopcr = 'Pendiente';
            $reporte->nombre_elaboro =
                'Q.F.B. Silvia Mariela González Rodríguez';
            $reporte->cargo_elaboro = 'Responsable Sanitario LUDIMUG';
            $reporte->nombre_autorizo =
                'Q.F.B. Silvia Mariela González Rodríguez';
            $reporte->cargo_autorizo = 'Responsable Sanitario LUDIMUG';
            $reporte->folio = date ('Y').'LUDIMUG-' . rand(300, 99999);
            $reporte->id = $request->id;
            $reporte->idDClinicos = $dclinicos->id;
            $reporte->idTratamiento = $tratamiento->id;
            $reporte->idAEpidemiologicos = $antepidemio->id;
            $reporte->idEvolucion = null;
            $reporte->save();

            Db::commit();

            return Redirect()
                ->back()
                ->with('success', 'El reporte se ha guardado correctamente');

            // foreach($request->sintoma as $row=>$value){
            //     echo var_dump($value[0][$index]);
            //     $index++;
            // }
            // Validate the value...
        } catch (\Illuminate\Database\QueryException $ex) {
            //return dd($validation);
            return dd($ex->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
