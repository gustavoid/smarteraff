<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
    use HasFactory;
    function product(){
        return $this->belongsTo('App\Product');
    }
    function ad(){
        return $this->belongsTo('App\Ads');
    }
}
