<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Anggaran;

class AnggaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function index()
	{if (auth()->user()->hasPermissionTo('anggaran')) {
            
        $anggaran = Anggaran::paginate(10);
        
        return view('dashboard.anggaran.index', ['anggaran' => $anggaran]);
    }else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function create()
	{if (auth()->user()->hasPermissionTo('anggaran-create')) {
        
		return view('dashboard.anggaran.create');
	}else{return abort(403);}}
    
    public function store(Request $request)
    {if (auth()->user()->hasPermissionTo('anggaran-create')) {
        
        $this->validate($request,[
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        
        $code = 'AKBJ0001';
        
        if (Anggaran::latest()->first() !== NULL) {
            $data = Anggaran::latest()->first();
            $number = trim($data->code,"AKBJ")+1;
            $code = 'AKBJ'.str_pad($number, 4, '0', STR_PAD_LEFT);
        }
        
        $anggaran = Anggaran::create([
            'code' => $code,
            'type' => $request->type,
            'category' => $request->category,
            'description' => $request->description,
            'amount' => str_replace(".", '', $request->amount),
            'status' => $request->status,
        ]);

        return redirect()->route('anggaran')->with('success', 'Keuangan berhasil dicatat!');
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function edit($id)
	{if (auth()->user()->hasPermissionTo('anggaran-edit')) {
        
		$anggaran = Anggaran::find($id);
        
		return view('dashboard.anggaran.edit',['anggaran' => $anggaran]);
	}else{return abort(403);}}
    
    public function update(Request $request, $id)
    {if (auth()->user()->hasPermissionTo('anggaran-edit')) {
        
		$anggaran = Anggaran::find($id);
		
        $this->validate($request,[
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

		$anggaran->type = $request->type;
		$anggaran->category = $request->category;
		$anggaran->amount = str_replace(".", '', $request->amount);
		$anggaran->description = $request->description;
		$anggaran->status = $request->status;
		$anggaran->save();
        
        return redirect()->route('anggaran')->with('success', 'Catatan berhasil di ubah!');
	}else{return abort(403);}}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function destroy($id)
    {if (auth()->user()->hasPermissionTo('anggaran-destroy')) {
        
        $anggaran = Anggaran::find($id);
        $anggaran->delete();
        
        return redirect()->back()->with('success', 'Catatan Anggaran berhasil di hapus!');
    }else{return abort(403);}}
}
