<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngContent extends Model
{
    protected $table = 'eng_content';

    public function eng(){

    	return $this->belongsTo('App\Eng');
    }
}
