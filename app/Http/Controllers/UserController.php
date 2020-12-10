<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\RT;
use App\Models\RW;
use App\Models\Dusun;
use App\Models\KurangMampu;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function penduduk()
	{
		$user = User::paginate(10);
		
		return view('dashboard.penduduk.index',['user' => $user]);
	}
    
    public function penduduk_filter_warga()
	{
		$user = User::role('Warga')->paginate(10);
		
		return view('dashboard.penduduk.index',['user' => $user]);
	}
    
    public function penduduk_filter_kurangmampu()
	{
		$user = KurangMampu::paginate(10);
		
		return view('dashboard.penduduk.kurang-mampu',['user' => $user]);
	}
	
	public function rt()
	{
		$user = RT::paginate(10);
		
		return view('dashboard.rukun-tetangga.index',['user' => $user]);
	}
	
	public function rw()
	{
		$user = RW::paginate(10);
		
		return view('dashboard.rukun-warga.index',['user' => $user]);
	}
	
	public function dusun()
	{
		$user = Dusun::paginate(10);
		
		return view('dashboard.dusun.index',['user' => $user]);
	}
}
