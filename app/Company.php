<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'nombreEmpresa', 'tipoEmpresa', 'logo', 'telefono'
    ];

    protected $hidden = [];

    public function users()
    {
        //Una compania tiene muchos usuarios
        return $this->hasMany(User::class);
    }

    public function anuncios()
    {
        //Una compania tiene muchos anuncios
        return $this->hasMany(Anuncio::class);
    }
}
