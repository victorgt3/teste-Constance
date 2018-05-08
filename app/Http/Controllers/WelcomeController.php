<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Perfil;
use App\Usuario;

class WelcomeController extends Controller
{
    public function index()
    {
       
        $usuario = DB::table('usuarios')
                     ->leftJoin('perfils', 'usuarios.id', '=', 'perfils.usuario_id')
                     ->get();
                      
        
        return view('welcome',compact('usuario'));
    }
}
