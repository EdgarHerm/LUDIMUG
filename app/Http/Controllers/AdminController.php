<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol == 0) {
            $reportescons =
                'SELECT * FROM reporte INNER JOIN persona ON reporte.idPersona = persona.id INNER JOIN direccion ON persona.idDireccion = direccion.id';
            $reportes = Db::select($reportescons);

            // echo dd($reportes);

            $sql = 'SELECT * FROM sintomas';
            $sintomas = Db::select($sql);

            $sql1 = 'SELECT * FROM comorbilidades';
            $comorbilidades = Db::select($sql1);

            $sql2 = 'SELECT * FROM o_sintomas';
            $o_sintomas = Db::select($sql2);

            $sql3 = 'SELECT * FROM vacunas';
            $vacunas = Db::select($sql3);

            return view(
                'site.sars',
                compact(
                    'sintomas',
                    'comorbilidades',
                    'o_sintomas',
                    'vacunas',
                    'reportes'
                )
            );
        } else {
            return Redirect::to('/');
        }
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reportescons =
            'SELECT * FROM reporte INNER JOIN persona ON persona.id = reporte.idPersona  INNER JOIN users ON users.id = persona.idUsuario INNER JOIN direccion ON persona.idDireccion = direccion.id WHERE reporte.id =' .
            $id;
        $reportes = Db::select($reportescons);

        return view('site.reporte', compact('reportes'));
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
