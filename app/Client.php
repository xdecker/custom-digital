<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
        'name', 'email', 'phone', 'observations', 'registrationDate', 'anuncio_id', 'seller_id','created_at','estado_id'
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

    public function estados()
    {
        return $this->hasOne(Estado::class, 'estado_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

}
