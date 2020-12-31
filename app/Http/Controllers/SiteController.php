<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Setting;
use App\Models\Visimisi;

class SiteController extends Controller
{
    public function index()
	{
		// Kawal Corona
		$glo['data'] = Setting::get();
        
        $CURL = curl_init();
		curl_setopt($CURL, CURLOPT_URL, 'https://api.kawalcorona.com/indonesia/provinsi/');
		curl_setopt($CURL, CURLOPT_RETURNTRANSFER, 1);
		$CURL_EXEC = curl_exec($CURL);
		curl_close($CURL);
		$CURL_RESULT=json_decode($CURL_EXEC,true);
        
        $KEY = -1;
        
        foreach($CURL_RESULT as $i=>$DATA){
            if($DATA['attributes']['Provinsi'] == $glo['data'][0]->A){
                $KEY = $i;
            }
        }
        
		$covid = $CURL_RESULT[$KEY]['attributes'];
        $article = Article::latest('id')->take(4)->get();
		
		return view('home',['covid' => $covid, 'article' =>$article]);
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function visimisi()
	{
		$visimisi = Visimisi::get();
		
		return view('visi-misi',['visimisi' => $visimisi]);
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function article()
	{
        $article = Article::where('status', 'Published')->paginate(5);
		return view('article', ['article' => $article]);
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function article_show($id)
	{
        $article = Article::find($id);
		return view('article-show', ['article' => $article]);
	}
}