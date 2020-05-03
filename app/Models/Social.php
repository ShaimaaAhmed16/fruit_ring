<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['provider_id','client_id','provider_id','provider'];

    function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
