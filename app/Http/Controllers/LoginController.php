<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo bcrypt('ludimugadmin2022');
        return view('site.login');
        //
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
        
    public function loginPost(Request $request){
        
        // Ejecutar validaciones de la petición
        $validateData = $request->validate([
            'password' => 'required|min:5|max:20',
            'email' => 'required|email'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // echo var_dump(Auth::user());
            if(Auth::user()->estatus=='1' && Auth::user()->rol=='0'){
                return Redirect::to('/');
            
            }

            if(Auth::user()->estatus=='1' && Auth::user()->rol=='1'){
                $sqltoken = 'SELECT token FROM users WHERE id ='.Auth::user()->id;
                $token = DB::select($sqltoken);
                $sql = 'SELECT * FROM persona WHERE id ='.Auth::user()->id;
                $user_profile = Db::select($sql);
                if($token[0]->token != null){
                    return Redirect::to('/email_validation');
                }else{
                    if($user_profile){
                        return Redirect::to('/');
                    }else{
                        return Redirect::to('/profile');
                    }
                }
            }else{
                echo ('Ya no estás en el sistema');
            }
            
        } else {
            return Redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
        }
    }
}
