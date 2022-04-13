<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class SarsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psql =
            'SELECT idPersona FROM persona WHERE idUsuario = ' .
            Auth::user()->id;
        $idPersona = DB::select($psql);

        if ($idPersona) {
            $reportescons =
                'SELECT * FROM reporte INNER JOIN persona ON persona.idPersona = reporte.idPersona INNER JOIN direccion ON persona.idDireccion = direccion.idDireccion WHERE persona.idPersona = ' .
                $idPersona[0]->idPersona;
            $reportes = Db::select($reportescons);
            return view('site.sars_user', compact('reportes'));
        }else{
            $reportes = [];
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
