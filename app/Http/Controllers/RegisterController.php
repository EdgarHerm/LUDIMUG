<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.register');
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
        
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //validacion del si el nombre de ususario ya existe
        $exists = User::where([
            'email' => $request->email,
        ])->exists();

        if ($exists) {
            return Redirect()->route('login')->withErrors(
                ["password"=>"Ya Existe un usuario con el mismo correo."]);
        }
        try {
            DB::beginTransaction();
            $newUser = substr($request->email, 0, strpos($request->email, '@'));
            $User = new User();
            $User->usuario = $newUser;
            $User->email = $request->email;
            $User->password = bcrypt($request->password);
            $User->estatus = 1;
            $User->remember_token = "NA";
            $User->email_verified_at = "2022-01-01 00:00:00";
            $User->created_at = "2022-01-01 00:00:00";
            $User->updated_at = "2022-01-01 00:00:00";
            $User->rol =  1;
            $User->save();

            DB::commit();

            
        } catch (\Throwable $th) {
            DB::rollback();
            return Redirect()->back()->withErrors(
                ["password"=>"Ocurrio un error al registrar el usuario".$th]);
        }
        
        $data = Str::random(7);
        $temporal_token = Str::random(60);
            $template_path = 'site.email_template';
            $correo = $request->email;
            Mail::send('site.email_template', ['data'=>$data], function($message) use ($correo) {
                $message->to($correo, 'Receiver Name')->subject('Confirmar correo electrónico');
                $message->from('ed.hermosillo@ugto.mx','Confirmacion de Registro');
            });
        return Redirect::to('/');
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
