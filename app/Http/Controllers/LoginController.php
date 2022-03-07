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
            'password' => 'required|min:5|max:10',
            'email' => 'required|email'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // echo var_dump(Auth::user());
            if(Auth::user()->estatus=='1'){
                $user = User::find(1);
                $sql = 'SELECT * FROM persona WHERE idPersona ='.Auth::user()->id;
                $user_profile = Db::select($sql);
        
                if($user_profile){
                    return Redirect::to('/');
                }else{
                    return Redirect::to('/profile');
                    
                }
                
            }else{
                
                echo ('Ya no estás en el sistema');
            } 
        } else {
            return Redirect()->route('login')->withErrors(
                ["password"=>"Las credenciales no coinciden"]);
        }
    }
}
