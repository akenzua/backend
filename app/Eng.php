<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eng extends Model
{
    protected $table = 'eng';

    public function eng_content(){

    	return $this->hasMany('App\EngContent');
    }

    public function eng_one_year(){

    	return $this->hasMany('App\EngOneYear');
    }

     public function eng_two_year(){

    	return $this->hasMany('App\EngTwoYear');
    }
}
