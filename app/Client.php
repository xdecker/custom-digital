<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
        'name', 'email', 'phone', 'observations', 'registrationDate'
    ];

    protected $hidden = [];


    public function ads()
    {
        return $this->belongsTo(Anuncio::class, 'anuncio_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }


}
