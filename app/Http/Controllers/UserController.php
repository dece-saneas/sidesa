<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\user;
use App\Models\NIK;
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
	
/// -------------------------------------------------------------------------------------------------------------------------------------- PENDUDUK
    
    public function penduduk()
	{
		$user = User::paginate(10);
		
		return view('dashboard.penduduk.index',['user' => $user]);
	}
    
    public function penduduk_create()
	{
		return view('dashboard.penduduk.create');
	}
    
    public function penduduk_store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'nik' => 'required|unique:nomor_induk_kependudukan,code',
            'gender' => 'required',
            'place' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);
        
        NIK::create([
            'user_id' => $user->id,
            'father_id' => NULL,
            'mother_id' => NULL,
            'code' => $request->nik,
            'place_of_birth' => $request->place,
            'date_of_birth' => $request->dob,
            'gender' => $request->gender,
            'blood_type' => NULL,
            'address' => $request->address,
            'dusun_id' => NULL,
            'rukun_warga_id' => NULL,
            'rukun_tetangga_id' => NULL,
            'religion' => NULL,
            'married_status' => NULL,
            'job_status' => NULL,
        ]);

        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil di tambahkan!');
	}
    
    public function penduduk_edit($id)
	{
		$user = User::find($id);
		return view('dashboard.penduduk.edit',['user' => $user]);
	}
	
	public function penduduk_update(Request $request, $id)
    {
		$user = User::find($id);
		
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'nik' => 'required|unique:nomor_induk_kependudukan,code,'.$user->nik->id,
            'gender' => 'required',
            'place' => 'required',
            'dob' => 'required',
            'address' => 'required',
			'password' => 'nullable|confirmed',
        ]);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->save();

		$nik = NIK::where('user_id', $id)->first();
		$nik->code=  $request->nik;
		$nik->place_of_birth=  $request->place;
		$nik->date_of_birth=  $request->dob;
		$nik->gender=  $request->gender;
		$nik->address=  $request->address;
		$nik->save();
		
		if(!empty($request->password)) {
			$user->password = Hash::make($request->password);
			$user->save();
		}
		
        return redirect()->route('penduduk')->with('success', 'Data penduduk berhasil di ubah!');
	}
    
    public function penduduk_destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil di hapus!');
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
    
/// -------------------------------------------------------------------------------------------------------------------------------------- RUKUN TETANGGA - RT
    
    public function rt()
	{
		$rt = RT::paginate(10);
		
		return view('dashboard.rukun-tetangga.index',['rt' => $rt]);
	}
    
    public function rt_create()
	{
        $rw = RW::all();
        $user = User::all();
		return view('dashboard.rukun-tetangga.create',['user' => $user, 'rw' => $rw]);
	}
    
    public function rt_store(Request $request)
    {
        $this->validate($request,[
            'number' => 'required',
            'rw' => 'required',
            'user' => 'required',
        ]);
        
        $ID = NULL;
        
        if($request->user > 0) {
            $user = User::find($request->user);
            $user->assignRole('Ketua RT');
            $ID = $request->user;
        }
        
        $user = RT::create([
            'number' => $request->number,
            'rukun_warga_id' => $request->rw,
            'user_id' => $ID,
        ]);
        
        return redirect()->route('rt')->with('success', 'RT berhasil di tambahkan!');
	}
    
    public function rt_edit($id)
	{
		$rt = RT::find($id);
        $rw = RW::all();
        $user = User::all();
		return view('dashboard.rukun-tetangga.edit',['user' => $user, 'rw' => $rw, 'rt' => $rt]);
	}
	
    public function rt_update(Request $request, $id)
    {
        $rt = RT::find($id);
        
		$this->validate($request,[
            'number' => 'required',
            'rw' => 'required',
            'user' => 'required',
        ]);
        
        $ID = NULL;
        
        if($request->user > 0) {
            if($rt->user_id > 0) {
                $user = User::find($rt->user_id);
                $user->removeRole('Ketua RT');
            }
            $user = User::find($request->user);
            $user->assignRole('Ketua RT');
            $ID = $request->user;
        }else {
            if($rt->user_id > 0) {
                $user = User::find($rt->user_id);
                $user->removeRole('Ketua RT');
            }
        }

		$rt->number = $request->number;
		$rt->rukun_warga_id = $request->rw;
		$rt->user_id = $ID;
		$rt->save();
		
        return redirect()->route('rt')->with('success', 'Data RT berhasil di ubah!');
	}
    
	public function rt_destroy($id)
    {
        $rt = RT::find($id);
        if($rt->user_id > 0) {
            $user = User::find($rt->user_id);
            $user->removeRole('Ketua RT');
        }
        $rt->delete();
        return redirect()->route('rt')->with('success', 'RT berhasil di hapus!');
    }

/// -------------------------------------------------------------------------------------------------------------------------------------- RUKUN WARGA - RW
    
	public function rw()
	{
		$rw = RW::paginate(10);
		
		return view('dashboard.rukun-warga.index',['rw' => $rw]);
	}
	
    public function rw_create()
	{
        $dusun = Dusun::all();
        $user = User::all();
		return view('dashboard.rukun-warga.create',['user' => $user, 'dusun' => $dusun]);
	}
    
    public function rw_store(Request $request)
    {
        $this->validate($request,[
            'number' => 'required',
            'dusun' => 'required',
            'user' => 'required',
        ]);
        
        $ID = NULL;
        
        if($request->user > 0) {
            $user = User::find($request->user);
            $user->assignRole('Ketua RW');
            $ID = $request->user;
        }
        
        $user = RW::create([
            'number' => $request->number,
            'dusun_id' => $request->dusun,
            'user_id' => $ID,
        ]);
        
        return redirect()->route('rw')->with('success', 'RW berhasil di tambahkan!');
	}
    
    public function rw_edit($id)
	{
		$rw = RW::find($id);
        $dusun = Dusun::all();
        $user = User::all();
		return view('dashboard.rukun-warga.edit',['user' => $user, 'rw' => $rw, 'dusun' => $dusun]);
	}
    
    public function rw_update(Request $request, $id)
    {
        $rw = RW::find($id);
        
		$this->validate($request,[
            'number' => 'required',
            'dusun' => 'required',
            'user' => 'required',
        ]);
        
        $ID = NULL;
        
        if($request->user > 0) {
            if($rw->user_id > 0) {
                $user = User::find($rw->user_id);
                $user->removeRole('Ketua RW');
            }
            $user = User::find($request->user);
            $user->assignRole('Ketua RW');
            $ID = $request->user;
        }else {
            if($rw->user_id > 0) {
                $user = User::find($rw->user_id);
                $user->removeRole('Ketua RW');
            }
        }

		$rw->number = $request->number;
		$rw->dusun_id = $request->dusun;
		$rw->user_id = $ID;
		$rw->save();
		
        return redirect()->route('rw')->with('success', 'Data RW berhasil di ubah!');
	}
    
    public function rw_destroy($id)
    {
        $rw = RW::find($id);
        if($rw->user_id > 0) {
            $user = User::find($rw->user_id);
            $user->removeRole('Ketua RW');
        }
        $rt = RT::where('rukun_warga_id', $id)->get();
        if(count($rt) > 0) {
            foreach($rt as $r) {
                $user = User::find($r->user_id);
                $user->removeRole('Ketua RT');
            }
        }
        $rw->delete();
        return redirect()->route('rw')->with('success', 'RW berhasil di hapus!');
    }
    
/// -------------------------------------------------------------------------------------------------------------------------------------- DUSUN
    
	public function dusun()
	{
		$dusun = Dusun::paginate(10);
		
		return view('dashboard.dusun.index',['dusun' => $dusun]);
	}
    
    public function dusun_create()
	{
        $user = User::all();
		return view('dashboard.dusun.create',['user' => $user]);
	}
    
    public function dusun_store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'user' => 'required',
        ]);
        
        $ID = NULL;
        
        if($request->user > 0) {
            $user = User::find($request->user);
            $user->assignRole('Kepala Dusun');
            $ID = $request->user;
        }
        
        $user = Dusun::create([
            'name' => $request->name,
            'user_id' => $ID,
        ]);
        
        return redirect()->route('dusun')->with('success', 'Dusun berhasil di tambahkan!');
	}
    
    public function dusun_edit($id)
	{
		$dusun = Dusun::find($id);
        $user = User::all();
		return view('dashboard.dusun.edit',['user' => $user, 'dusun' => $dusun]);
	}
    
    public function dusun_update(Request $request, $id)
    {
        $dusun = Dusun::find($id);
        
		$this->validate($request,[
            'name' => 'required',
            'user' => 'required',
        ]);
        
        $ID = NULL;
        
        if($request->user > 0) {
            if($dusun->user_id > 0) {
                $user = User::find($dusun->user_id);
                $user->removeRole('Kepala Dusun');
            }
            $user = User::find($request->user);
            $user->assignRole('Kepala Dusun');
            $ID = $request->user;
        }else {
            if($dusun->user_id > 0) {
                $user = User::find($dusun->user_id);
                $user->removeRole('Kepala Dusun');
            }
        }

		$dusun->name = $request->name;
		$dusun->user_id = $ID;
		$dusun->save();
		
        return redirect()->route('dusun')->with('success', 'Data Dusun berhasil di ubah!');
	}
    
    public function dusun_destroy($id)
    {
        $dusun = Dusun::find($id);
        if($dusun->user_id > 0) {
            $user = User::find($dusun->user_id);
            $user->removeRole('Kepala Dusun');
        }
        $rw = RW::where('dusun_id', $id)->get();
        if(count($rw) > 0) {
            foreach($rw as $r) {
                $rt = RT::where('rukun_warga_id', $r->id)->get();
                if(count($rt) > 0) {
                    foreach($rt as $r2) {
                        $user = User::find($r2->user_id);
                        $user->removeRole('Ketua RT');
                    }
                }
                $user = User::find($r->user_id);
                $user->removeRole('Ketua RW');
            }
        }
        $dusun->delete();
        return redirect()->route('dusun')->with('success', 'Dusun berhasil di hapus!');
    }
}
