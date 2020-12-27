<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class SiteController extends Controller
{
    public function index()
	{
		// Kawal Corona
        
        $CURL = curl_init();
		curl_setopt($CURL, CURLOPT_URL, 'https://api.kawalcorona.com/indonesia/provinsi/');
		curl_setopt($CURL, CURLOPT_RETURNTRANSFER, 1);
		$CURL_EXEC = curl_exec($CURL);
		curl_close($CURL);
		$CURL_RESULT=json_decode($CURL_EXEC,true);
        
        $KEY = -1;
        
        foreach($CURL_RESULT as $i=>$DATA){
            if($DATA['attributes']['Provinsi'] == "Aceh"){
                $KEY = $i;
            }
        }
        
		$covid = $CURL_RESULT[$KEY]['attributes'];
			
		return view('home',['covid' => $covid]);
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function visimisi()
	{
		return view('visi-misi');
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function article()
	{
        $article = Article::where('status', 'Published')->paginate(5);
		return view('article', ['article' => $article]);
	}
}