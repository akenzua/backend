<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use JWTAuth;
use App\English;
// use App\EnglishContent;

class DevotionalsController extends Controller
{
    public function index($lang){

    	$devotional = $lang;
    	$devotional = 'App\\' . $devotional;
    	$devotional = $devotional::all();
    	
    	return $devotional;
    }

    public function show($lang, $date){
        $user = JWTAuth::parseToken()->toUser();
    	$language = ucfirst($lang);
    	

       

    	$devotional = 'App\\' . $language;
        
    	$devotional = $devotional::where('date', $date)->firstorFail();
        // return $devotional;
        $one_year = $language . '_one_year';
        $two_year = $language . '_two_year';
    	$content = $language . '_content';
    	// return $content;

    	$paragraphs = $devotional->$content;
         // return $paragraphs; 
        $one_year = $devotional->$one_year;
        $two_year = $devotional->$two_year;

    	return response()->json(['devotional' => $devotional], 200);

    }
}
