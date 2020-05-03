<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $table = 'clients';
    public $timestamps = true;
   protected $fillable =['full_name','email','phone','address','password','image','status','pin_cod'];

    function socialProviders()
    {
        return $this->hasMany('App\Models\Social');
    }
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
