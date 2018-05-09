<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $guarded = ['id'];
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

}
