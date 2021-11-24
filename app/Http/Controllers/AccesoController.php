<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AccesoController extends Controller
{
    //

    public function validar(Request $r){
    	$usuario=$r->get('usuario');
    	$password=$r->get('password');

    	$validarUsuario=DB::SELECT("SELECT *
    	                            FROM usuarios
    		                        WHERE usuario= '$usuario'");

    	// return $validarUsuario;

    	if(!empty($validarUsuario)){
    		// return 'EL USUARIO EXISTE';
    		// return $validarUsuario;

            $validarUsuario=$validarUsuario[0]

                $passBD=$validarUsuario->password;

    		if($passBD==$password)
                return 'BIENVENIDO AL SISTEMA';
            else
            	return 'LA CONTRASEÑA ES INCORRECTA';

    	}
    	else
    		return 'EL USUARIO NO EXISTE';



    	
    	//return "Mi usuario es : $usuario y mi password es: $password";
    }

}
 