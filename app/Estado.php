<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $fillable = [
        'nombreEstado'
    ];

    protected $hidden = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
