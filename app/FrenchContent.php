<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrenchContent extends Model
{
    protected $table = 'french_content';

    public function french(){

    	return $this->belongsTo('App\French');
    }
}
