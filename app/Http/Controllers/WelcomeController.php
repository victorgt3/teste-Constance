<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Usuario;

class WelcomeController extends Controller
{
    public function index()
    {
        $perfil = Perfil::all();
        $usuario = Usuario::all();
        
        return view('welcome',compact('perfil', 'usuario'));
    }
}
