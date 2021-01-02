<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\Setting;
use App\Models\Visimisi;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function index()
	{        
		return view('dashboard.setting');
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function info()
	{        
		return view('dashboard.info');
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function visimisi()
	{        
        $visi = Visimisi::find(1);
        $misi = Visimisi::where('id', '>', 1)->paginate(10);
        
		return view('dashboard.visimisi', ['misi' => $misi, 'visi'=> $visi]);
	}
 
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function visimisi_create()
	{
		return view('dashboard.visimisi-create');
	}
    
    public function visimisi_store(Request $request)
    {
        
        $this->validate($request,[
            'content' => 'required',
        ]);
        
        $visimisi = Visimisi::create([
            'content' => $request->content,
        ]);
        
        return redirect()->route('visimisi')->with('success', 'Misi berhasil ditambahkan!');
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function update(Request $request)
    {
		$setting_1 = Setting::find(1);
		$setting_2 = Setting::find(2);
		
        $this->validate($request,[
            'desa' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'logo_desa' => 'file|image|mimes:jpeg,png|max:2048',
            'logo_provinsi' => 'file|image|mimes:jpeg,png|max:2048',
            'logo_kabupaten' => 'file|image|mimes:jpeg,png|max:2048',
            'maps' => 'required',
            'operational' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);

		$setting_1->A = $request->provinsi;
		$setting_1->C = $request->kabupaten;
		$setting_1->E = $request->kecamatan;
		$setting_1->F = $request->desa;
		$setting_1->save();
        
        $setting_2->A = $request->maps;
		$setting_2->B = $request->operational;
		$setting_2->C = $request->phone;
		$setting_2->D = $request->email;
		$setting_2->E = $request->facebook;
		$setting_2->F = $request->twitter;
		$setting_2->G = $request->instagram;
		$setting_2->save();
        
        if($request->hasFile('logo_desa')){
            $image = $request->file('logo_desa');
            Image::make($image)->resize(128, 128)->save(public_path('img/logo/'.$setting_1->G));
        }
        
        if($request->hasFile('logo_provinsi')){
            $image = $request->file('logo_provinsi');
            Image::make($image)->resize(300, 200)->save(public_path('img/logo/'.$setting_1->B));
        }
        
        if($request->hasFile('logo_kabupaten')){
            $image = $request->file('logo_kabupaten');
            Image::make($image)->resize(300, 200)->save(public_path('img/logo/'.$setting_1->D));
        }
        
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function info_update(Request $request)
    {
		$setting = Setting::find(3);
		
        $this->validate($request,[
            'content' => 'required',
            'image' => 'file|image|mimes:jpeg,png|max:2048',
        ]);

		$setting->B = $request->content;
		$setting->save();
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            Image::make($image)->resize(855, 571)->save(public_path('img/info/'.$setting->A));
        }
        
        return redirect()->back()->with('success', 'Info berhasil diperbarui!');
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function visimisi_edit($id)
	{
        $visimisi = Visimisi::findorFail($id);
        
		return view('dashboard.visimisi-edit', ['visimisi' => $visimisi]);
	}
    
    public function visimisi_update(Request $request, $id)
    {
        
		$visimisi = Visimisi::find($id);
		
        $this->validate($request,[
            'content' => 'required',
        ]);

		$visimisi->content = $request->content;
		$visimisi->save();
        
        $type = 'Mission';
        
        if ($visimisi->id == 1) {
             $type = 'Vision';
        }
        
        return redirect()->route('visimisi')->with('success', $type.' berhasil di ubah!');
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function visimisi_destroy($id)
    {
        $all = Visimisi::get();
        
        if(count($all) > 2 ) {
            $visimisi = Visimisi::find($id);
            $visimisi->delete();
            return redirect()->back()->with('success', 'Misi berhasil dihapus!');
        }else {
            return redirect()->back()->with('error', 'Misi tidak boleh kosong!');
        }
        
	}
}
