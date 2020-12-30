<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
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
        
        return view('dashboard',['covid' => $covid]);
    }
}