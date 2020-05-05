<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['status','total','client_id'];

    public function products(){
        return $this->belongsToMany('App\Models\Product');
    }

    public function orderProducts(){
        return $this->hasMany('App\Models\OrderProduct');
    }
    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
}
