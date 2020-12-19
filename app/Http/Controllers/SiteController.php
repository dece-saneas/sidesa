<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
	{
		$KC = curl_init();
		curl_setopt($KC, CURLOPT_URL, 'https://api.kawalcorona.com/indonesia/provinsi/');
		curl_setopt($KC, CURLOPT_RETURNTRANSFER, 1);
		$KCP = curl_exec($KC);
		curl_close($KC);
		$result=json_decode($KCP,true);
		$covid = $result[16]['attributes'];
			
		return view('home',['covid' => $covid]);
	}
    
    public function visimisi()
	{
		return view('visi-misi');
	}
	
	public function article()
	{
		return view('article');
	}
}
