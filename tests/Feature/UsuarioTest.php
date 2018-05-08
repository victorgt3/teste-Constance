<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\Usuario;
use App\Perfil;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_usuario()
    {
        Usuario::create([
            'nome'=>'Victor',
            'email'=>'admin@mail.com',
            'telefone'=>'31 97311 - 7297',
            'dn'=> date('1987-08-21'),
            'cargo'=>'Analista',
            'salario'=>2600.00,
            'foto'=> UploadedFile::fake()->image('avatar.jpg')
        ]);

        $this->assertDatabaseHas('usuarios',['nome'=>'Victor']);
    }

    public function test_create_usuario_perfil()
    {
        $usuario = Usuario::create([
            'nome'=>'Victor',
            'email'=>'admin@mail.com',
            'telefone'=>'31 97311 - 7297',
            'dn'=> date('1987-08-21'),
            'cargo'=>'Analista',
            'salario'=>2600.00,
            'foto'=> UploadedFile::fake()->image('avatar.jpg')
        ]);

        $usuarioPerfil = Perfil::create([
            'usuario_id'=>$usuario->id,
            'nome_perfil'=>'victorgt3',
            'descricao'=>'Tem o cargo de Analista'
        ]);

        $this->assertDatabaseHas('usuarios',['nome'=>'Victor']);
        $this->assertDatabaseHas('perfils',[
            'usuario_id'=>$usuario->id,
            'nome_perfil'=>'victorgt3'
            ]);
    }

    

    public function test_create_usuario_using_form()
    {
        $this->get("/")
            ->assertSee("Cadastrar Usuario")
            
            ;
    }
}
