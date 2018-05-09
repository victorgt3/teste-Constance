<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Usuario;
use App\Perfil;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $usuario = new Usuario();
        $usuario->nome = $request->get('nome');
        $usuario->email = $request->get('email');
        $usuario->telefone = $request->get('telefone');
        $usuario->dn = $request->get('dn');
        $usuario->cargo = $request->get('cargo');
        $usuario->salario = $request->get('salario');
        
        

       if($request->hasFile('foto'))
            
         {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);
            $image = $destinationPath.'/'.$name;
            $image = explode("/", $image);
            $image = $image[1]."/".$image[2];
             
         }
         
         $usuario->foto = $image;
         $usuario->save();

         $produto = Usuario::find($usuario->id);
         $id = $usuario->id;
         $perfil =  new Perfil();
         $perfil->usuario_id = $id;
         $perfil->descricao = $request->get('descricao');
         $perfil->nome_perfil = $request->get('nome_perfil');
         $perfil->save();
         
            \Session::flash('flash_message',[
                'msg'=>"Usuario adicionado com Sucesso!",
                'class'=>"alert-success"
            ]);

            return redirect()->action('WelcomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Perfil::find($id);
        $usuario = Usuario::find($id);

        return view('usuario.editar',compact('perfil', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->nome = $request->get('nome');
        $usuario->email = $request->get('email');
        $usuario->telefone = $request->get('telefone');
        $usuario->dn = $request->get('dn');
        $usuario->cargo = $request->get('cargo');
        $usuario->salario = $request->get('salario');
        
        

       if($request->hasFile('foto'))
            
         {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);
            $image = $destinationPath.'/'.$name;
            $image = explode("/", $image);
            $image = $image[1]."/".$image[2];
                 
         }
         $usuario->foto = $image;
         $usuario->update();

         $produto = Usuario::find($usuario->id);
         $id = $usuario->id;
         $perfil =  Perfil::find($id);
         $perfil->usuario_id = $id;
         $perfil->descricao = $request->get('descricao');
         $perfil->nome_perfil = $request->get('nome_perfil');
         $perfil->update();
         
            \Session::flash('flash_message',[
                'msg'=>"Usuario foi atualizado com Sucesso!",
                'class'=>"alert-success"
            ]);

            return redirect()->action('WelcomeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $perfil = Perfil::find($id);
        $perfil->delete();
        $usuario->delete();
        \Session::flash('flash_message',[
			'msg'=>"Usuario foi deletado com Sucesso!",
			'class'=>"alert-success"
    	]);

        return redirect()->action('WelcomeController@index');

    }
}
