<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Evolucion;

use Redirect;
use Mail;
use App\Models\Reporte;

class EvolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $validate = $request->validate([
            'evolucion' => 'required',
            'resultado' => 'required',
            'nombres' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'email' => 'required',
        ]);
        try {
            Db::beginTransaction();

            $evolucion = new Evolucion();

            $evolucion->evolucion = $request->evolucion;
            $evolucion->caltaevo = null;
            $evolucion->eoeuci_enfermedad = 'No';
            $evolucion->eoe_intubado = 'No';
            $evolucion->eoe_neumonia = 'No';
            $evolucion->fegreso = null;
            $evolucion->pa = null;
            $evolucion->pb = null;
            $evolucion->pc = 'x';
            $evolucion->fdefuncion = null;
            $evolucion->fcdefuncion = 'NA';
            $evolucion->dfuncion_infcovid = 'No';

            $evolucion->save();

            $reporte = Reporte::find($request->id);

            $reporte->idEvolucion = $evolucion->id;
            $reporte->rmuestra = $request->resultado;
            $reporte->resultadopcr = $request->resultado;
            $reporte->felaboracion = date('Y-m-d');
            $reporte->save();

            Db::commit();

            $data =
                $request->nombres .
                ' ' .
                $request->apellidop .
                ' ' .
                $request->apellidom;
            $template_path = 'result_template';
            $correo = $request->email;
            Mail::send('site.result_template', ['data' => $data], function (
                $message
            ) use ($correo) {
                $message
                    ->to($correo, 'Receiver Name')
                    ->subject('RESULTADO DE LABORATORIO');
                $message->from(
                    'ed.hermosillo@ugto.mx',
                    'ed.hermosillo@ugto.mx'
                );
            });

            return Redirect::to('/');
        } catch (\Throwable $th) {
            Db::rollback();
            return Redirect()
                ->back()
                ->withErrors([
                    'password' =>
                        'Ocurrio un error al registrar el usuario' . $th,
                ]);
        }

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
