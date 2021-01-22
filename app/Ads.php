<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    function product(){
        return $this->belongsTo('App\Product');
    }
    function keywords(){
        return $this->hasMany('App\Keywords');
    }
}
