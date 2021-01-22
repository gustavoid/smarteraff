<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function temperatures(){
        return $this->hasMany('App\Temperature');
    }
    function network(){
        return $this->hasOne('App\Network');
    }
    function keywords(){
        return $this->hasMany('App\Keywords');
    }
    function ads(){
        return $this->hasMany('App\Ads');
    }
    function notes(){
        return $this->hasMany('App\Notes');
    }
}
