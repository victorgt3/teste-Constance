<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'usuario_id',
        'nome_perfil',
        'descricao'
    ];
    
    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
