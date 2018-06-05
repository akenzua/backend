<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\English;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;


class BibleReadingController extends Controller
{
    public function show($lang, $date){
        
    	$language = $lang;
    	

       

    	$devotional = 'App\\' . $language;
    	$bible_plan = $devotional::where('date', $date)->firstorFail();
    	$one_year = $language . '_one_year';
    	$two_year = $language . '_two_year';
    	//return $content;

    	$one_year = $bible_plan->$one_year;
    	$two_year = $bible_plan->$two_year;

    	return response()->json(['one_year' => $one_year , 'two_year' => $two_year], 200);

    }
  //   public function test(){
  //   	$client = new GuzzleHttpClient(['verify' => false ]);

  //   	$res = $client->request('GET', 'https://bibles.org/v2/versions.js', [
  //   	'auth' => ['Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g', 'Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g']
		// ]);
		
		// return json_decode($res->getBody(), true);
		
		
  //   }
    public function versions($lang){

        $base = 'https://bibles.org/v2/versions.js?language=';
        $lang = $lang;
        $url = $base . $lang; 
        // return $url;
    	$client = new GuzzleHttpClient(['verify' => false ]);

    	$res = $client->request('GET', $url, [
    	'auth' => ['Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g', 'Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g']
		]);
		
		return json_decode($res->getBody(), true);
		
		
    }

    public function books($version){

    	$base = 'https://bibles.org/v2/versions/';
    	$version = $version;
    	$rem = '/books.js?include_chapters=true';
    	$url = $base . $version . $rem;
    //return $url;
    	$client = new GuzzleHttpClient(['verify' => false ]);

    	$res = $client->request('GET', $url, [
    	'auth' => ['Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g', 'Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g']
    	
		]);
		
		return json_decode($res->getBody(), true);
		
		
    }

    public function opening($opening){
        https://bibles.org/v2/passages.js?q[]=john+3:1-5&version=eng-KJVA
        $base = 'https://bibles.org/v2/passages.js?q[]=';
        $passage = $opening;
        $url = $base . $passage;

        // return $url;

        $client = new GuzzleHttpClient(['verify' => false ]);

        $res = $client->request('GET', $url, [
        'auth' => ['Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g', 'Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g']
        
        ]);
        
        return json_decode($res->getBody(), true);
    }

     public function chapter($chapter){
     	
    	$base = 'https://bibles.org/v2/chapters/';
    	$chapter = $chapter;
    	$rem = '/verses.js';
    	$url = $base . $chapter . $rem;
    	//return $url;
    	$client = new GuzzleHttpClient(['verify' => false ]);

    	$res = $client->request('GET', $url, [
    	'auth' => ['Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g', 'Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g']
    	
		]);
		
		return json_decode($res->getBody(), true);
		
		
    }

    // https://bibles.org/v2/chapters/eng-KJVA:Acts.8.js
     public function chapterDetails($details){
        
        $base = 'https://bibles.org/v2/chapters/';
        $details = $details;
        $rem = '.js';
        $url = $base . $details . $rem;
        // return $url;
        $client = new GuzzleHttpClient(['verify' => false ]);

        $res = $client->request('GET', $url, [
        'auth' => ['Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g', 'Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g']
        
        ]);
        
        return json_decode($res->getBody(), true);
        
        
    }

 // https://bibles.org/v2/passages.js?q[]=john+3:1-5&version=eng-KJVA
    public function further($further){
        $base = 'https://bibles.org/v2/passages.js?q[]=';
        
        $url = $base . $further;

        $client = new GuzzleHttpClient(['verify' => false ]);

        $res = $client->request('GET', $url, [
        'auth' => ['Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g', 'Je9Gkr0nPxow7iszRGlajBwZ8MQvDdJcLKuhZP8g']
        
        ]);
        
        return json_decode($res->getBody(), true);
        
}
}
