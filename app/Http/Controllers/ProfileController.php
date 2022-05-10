<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Direccion;
use App\Models\Persona;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql =
            'SELECT * FROM persona as p INNER JOIN direccion as d ON p.idDireccion = d.id WHERE p.idUsuario =' .
            Auth::user()->id;
        $user_profile = Db::select($sql);
        // echo var_dump($user_profile[0]);
        if ($user_profile) {
            return view('site.profile', compact('user_profile'));
        } else {
            return view('site.profile');
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
        //return dd($request->all());
        
        if($request->idpersona){
            $validated = $request->validate([
                //direccion
                'idpersona' => 'required',
                'iddireccion' => 'required',
                'apellidop' => 'required',
                'apellidom' => 'required',
                'nombres' => 'required',
                'ocupacion' => 'required',
                'nuae' => 'required',
                'inseducativa' => 'required',
                'fechanac' => 'required',
                'curp' => 'required',
                'sexo' => 'required',
                'telefonoc' => 'required',
                'pindigena' => 'required',
                'lindigena' => 'required',
                'nacionalidad' => 'required',
                'pnacionalidad' => 'required',
                'porigen' => 'required',
                'pnac' => 'required',
                'efednac' => 'required',
                'eresidencia' => 'required',
                'mresidencia' => 'required',
                'localidad' => 'required',
                'calle' => 'required',
                'numero' => 'required',
                'calle1' => 'required',
                'calle2' => 'required',
                'colonia' => 'required',
                'cp' => 'required',
            
            ]);

            DB::beginTransaction();

            $direcion = Direccion::find(intval($request->iddireccion));

            // return dd($direcion->all());


            $direcion->efednac = $request->efednac;
            $direcion->eresidencia = $request->eresidencia;
            $direcion->mresidencia = $request->mresidencia;
            $direcion->localidad = $request->localidad;
            $direcion->calle = $request->calle;
            $direcion->numero = $request->numero;
            $direcion->calle1 = $request->calle1;
            $direcion->calle2 = $request->calle2;
            $direcion->colonia = $request->colonia;
            $direcion->cp = $request->cp;
            $direcion->save();

            $persona = Persona::find($request->idpersona);
            
            $persona->apellidop = $request->apellidop;
            $persona->apellidom = $request->apellidom;
            $persona->nombres = $request->nombres;
            $persona->ocupacion = $request->ocupacion;
            $persona->fechanac = $request->fechanac;
            $persona->curp = $request->curp;
            $persona->sexo = $request->sexo;
            $persona->telefonoc = $request->telefonoc;
            $persona->nacionalidad = $request->nacionalidad;
            $persona->pnacionalidad = $request->pnacionalidad;
            $persona->porigen = $request->porigen;
            $persona->pnac = $request->pnac;
            if ($request->nacionalidad == 'Mexicana') {
                $persona->emigrante = 'No';
            } else {
                $persona->emigrante = 'Sí';
            }
           
            
            
            $persona->inseducativa = $request->inseducativa;
            $persona->save();
            DB::commit();

            return Redirect()
            ->back()
            ->withErrors(['perfil' => 'Datos actualizados correctamente']);
        }else{

            $validated = $request->validate([
                //persona
                'apellidop' => 'required',
                'apellidom' => 'required',
                'nombres' => 'required',
                'ocupacion' => 'required',
                'nuae' => 'required',
                'inseducativa' => 'required',
                'fechanac' => 'required',
                'curp' => 'required',
                'sexo' => 'required',
                'telefonoc' => 'required',
                'pindigena' => 'required',
                'lindigena' => 'required',
                'nacionalidad' => 'required',
                'pnacionalidad' => 'required',
                'porigen' => 'required',
                'pnac' => 'required',

                //direccion

                'efednac' => 'required',
                'eresidencia' => 'required',
                'mresidencia' => 'required',
                'localidad' => 'required',
                'calle' => 'required',
                'numero' => 'required',
                'calle1' => 'required',
                'calle2' => 'required',
                'colonia' => 'required',
                'cp' => 'required',
            
            ]);


            DB::beginTransaction();

            $registerAddress = new Direccion();
            $registerAddress->efednac = $request->efednac;
            $registerAddress->eresidencia = $request->eresidencia;
            $registerAddress->mresidencia = $request->mresidencia;
            $registerAddress->localidad = $request->localidad;
            $registerAddress->calle = $request->calle;
            $registerAddress->numero = $request->numero;
            $registerAddress->calle1 = $request->calle1;
            $registerAddress->calle2 = $request->calle2;
            $registerAddress->colonia = $request->colonia;
            $registerAddress->cp = $request->cp;
            $registerAddress->updated_at = date('Y-m-d H:i:s');
            $registerAddress->save();

            $registerPerson = new Persona();
            
            $registerPerson->nombres = $request->nombres;
            $registerPerson->apellidop = $request->apellidop;
            $registerPerson->apellidom = $request->apellidom;
            $registerPerson->ocupacion = $request->ocupacion;
            $registerPerson->nuae = $request->nuae;
            $registerPerson->inseducativa = $request->inseducativa;
            $registerPerson->fechanac = $request->fechanac;
            $registerPerson->curp = $request->curp;
            $registerPerson->sexo = $request->sexo;
            $registerPerson->telefonoc = $request->telefonoc;
            $registerPerson->pindigena = $request->pindigena;
            $registerPerson->lindigena = $request->lindigena;
            $registerPerson->nacionalidad = $request->nacionalidad;
            $registerPerson->pnacionalidad = $request->pnacionalidad;
            $registerPerson->porigen = $request->porigen;
            $registerPerson->pnac = $request->pnac;
            if ($request->nacionalidad == 'Mexicana') {
                $registerPerson->emigrante = 'No';
            } else {
                $registerPerson->emigrante = 'Sí';
            }
           
            $registerPerson->updated_at = date('Y-m-d H:i:s');
            $registerPerson->idDireccion = $registerAddress->id;
            $registerPerson->idUsuario = Auth::user()->id;
            $registerPerson->save();
            
            DB::commit();

            return Redirect()
            ->back()
            ->withErrors(['perfil' => 'Datos guardados correctamente']);
        }


        //Auth::user()->id

        

        
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
