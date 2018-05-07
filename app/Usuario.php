<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'dn',
        'cargo',
        'salario',
        'foto'
    ];

    public function perfil()
    {
       return $this->hasMany('App\Perfil','usuario_id');
    }

    public function deletarFotos()
    {
        foreach($this->perfil as $foto)
        {
             $foto->delete();
        }
 
        return true;
    }
}
