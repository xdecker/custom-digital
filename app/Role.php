<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['name'];

    protected $hidden = [];



    public function users(){
        return $this->hasOne(User::class);
    }
}
