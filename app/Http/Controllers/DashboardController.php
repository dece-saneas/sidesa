<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $KC = curl_init();
		curl_setopt($KC, CURLOPT_URL, 'https://api.kawalcorona.com/indonesia/provinsi/');
		curl_setopt($KC, CURLOPT_RETURNTRANSFER, 1);
		$KCP = curl_exec($KC);
		curl_close($KC);
		$result=json_decode($KCP,true);
		$covid = $result[16]['attributes'];
        
        return view('dashboard',['covid' => $covid]);
    }
}
