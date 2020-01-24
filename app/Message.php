<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['nombre', 'correo', 'asunto', 'contenido', 'attachments'];

    protected $hidden = [];


    public function sellers()
    {
        return $this->hasMany(Seller::class,'seller_id');
    }
}
