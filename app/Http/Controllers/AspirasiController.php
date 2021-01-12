<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function index()
	{if (auth()->user()->hasPermissionTo('aspirasi')) {
        
        $aspirasi= Aspirasi::where('user_id', auth()->user()->id)->paginate(10);
        
        if (auth()->user()->hasrole('Admin')) {
            $aspirasi = Aspirasi::paginate(10);
        }
        
        return view('dashboard.aspirasi', ['aspirasi' => $aspirasi]);
    }else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function create()
	{if (auth()->user()->hasPermissionTo('aspirasi-create')) {

        return view('dashboard.aspirasi-create');
	}else{return abort(403);}}
    
    public function store(Request $request)
    {if (auth()->user()->hasPermissionTo('aspirasi-create')) {
        
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);

        $surat =Aspirasi::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'message' => $request->description,
            'status' => 'Terkirim',
        ]);

        return redirect()->route('aspiration')->with('success', 'Aspirasi berhasil dikirim!');
	}else{return abort(403);}}
    
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function process($id)
	{if (auth()->user()->hasPermissionTo('aspirasi-confirm')) {
        
		$aspirasi = Aspirasi::find($id);
        
        if($aspirasi->status == 'Terkirim') {
            $aspirasi->status = 'Sudah Diterima';
            $aspirasi->save();
        }
        
		return redirect()->back();
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function destroy($id)
    {if (auth()->user()->hasPermissionTo('aspirasi-destroy')) {
        
        $aspirasi = Aspirasi::find($id);
        
        $aspirasi->delete();
        
        return redirect()->back()->with('success', 'Aspirasi kamu berhasil di hapus!');
    }else{return abort(403);}}
}
