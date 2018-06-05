<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class French extends Model
{
    protected $table = 'french';

    public function french_content(){

    	return $this->hasMany('App\FrenchContent');
    }
}
