<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = ['nameFile', 'description', 'seller_id', 'anuncio_id'];

    protected $hidden = [];


    public function ads()
    {
        return $this->belongsTo(Anuncio::class, 'anuncio_id');
    }
}
