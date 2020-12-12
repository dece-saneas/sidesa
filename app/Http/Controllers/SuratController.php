<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Surat;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function index()
	{if (auth()->user()->hasPermissionTo('surat')) {
            
        $surat = Surat::where('user_id', auth()->user()->id)->paginate(10);

        if (auth()->user()->hasrole('Admin')) {
            $surat = Surat::paginate(10);
        }

        return view('dashboard.surat.index', ['surat' => $surat]);
    }else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function create()
	{if (auth()->user()->hasPermissionTo('surat-create')) {
        
		return view('dashboard.surat.create');
	}else{return abort(403);}}
    
    public function store(Request $request)
    {if (auth()->user()->hasPermissionTo('surat-create')) {
        
        $this->validate($request,[
            'type' => 'required',
            'message' => 'required',
        ]);

        $surat = Surat::create([
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'message' => $request->message,
            'status' => 'Terkirim',
        ]);

        return redirect()->route('surat')->with('success', 'Permohonan surat berhasil dikirim!');
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function process($id)
	{if (auth()->user()->hasPermissionTo('surat-process')) {
        
		$surat = Surat::find($id);
        
        if($surat->status == 'Terkirim') {
            $surat->status = 'Di Proses';
            $surat->save();
        }else {
            $surat->status = 'Selesai';
            $surat->save();
        }
        
		return redirect()->back();
	}else{return abort(403);}}
 
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function destroy($id)
    {if (auth()->user()->hasPermissionTo('surat-destroy')) {
        
        $surat = Surat::find($id);
        
        if(auth()->user()->hasrole('Admin')) {
            if($surat->status == 'Di Proses') {
                return abort(403);
            }else {
                $surat->delete();
            }
        }else {
            if($surat->user_id == auth()->user()->id) {
                if($surat->status == 'Di Proses') {
                    return abort(403);
                }else {
                    $surat->delete();
                }
            }else{return abort(404);}
        }
        return redirect()->back()->with('success', 'RT berhasil di hapus!');
    }else{return abort(403);}}
}
