<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    //
    protected $fillable = ['nombre', 'descripcion', 'ubicacion', 'palabrasClaves',
        'fechaInicio', 'fechaFin', 'presupuesto', 'company_id'
    ];

    protected $hidden = [];

    public function company()
    {
        //Varios anuncios corresponden a una compania
        return $this->belongsTo(Company::class);
    }
}
