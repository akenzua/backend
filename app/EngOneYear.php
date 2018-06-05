<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngOneYear extends Model
{
    protected $table = 'eng_one_year';

    public function eng(){

    	return $this->belongsTo('App\En');
}
}