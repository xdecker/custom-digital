<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = [];

    protected $hidden = [];

    public function sellers()
    {

    }

    public function ads()
    {
        return $this->belongsTo(Anuncio::class, 'anuncio_id');
    }
}
