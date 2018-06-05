<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngTwoYear extends Model
{
     protected $table = 'eng_two_year';

    public function english(){

    	return $this->belongsTo('App\English');
}
}