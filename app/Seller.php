<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    protected $fillable = ['user_id', 'ventasEstimadas', 'ventasReales', 'progreso'
        ];

    protected $hidden = [];


    public function user (){
        return $this->belongsTo(User::class);
    }
}
