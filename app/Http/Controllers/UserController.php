<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;
use App\Models\user;
use App\Models\NIK;
use App\Models\RT;
use App\Models\RW;
use App\Models\Dusun;
use App\Models\Jurnalis;
use App\Models\KurangMampu;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- JSON
    
    public function json_rw($id)
    {
        if (auth()->user()->hasrole('Admin')) {
            $rw = RW::where('dusun_id', $id)->get();
        }elseif (auth()->user()->hasrole('Ketua RW')) {
            $rw = RW::where('id', auth()->user()->rw->id)->get();
        }elseif (auth()->user()->hasrole('Ketua RT')) {
            $rw = RW::where('id', auth()->user()->rt->rukun_warga->id)->get();
        }
        
        return response()->json($rw);
    }
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function json_rt($id)
    {
        if (auth()->user()->hasrole('Admin')) {
            $rt = RT::where('rukun_warga_id', $id)->get();
        }elseif (auth()->user()->hasrole('Ketua RT')) {
            $rt = RT::where('id', auth()->user()->rt->id)->get();
        }
        
        return response()->json($rt);
    }
    
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- PENDUDUK
    
    public function penduduk()
	{if (auth()->user()->hasPermissionTo('penduduk')) {
        
        if (auth()->user()->hasrole('Admin')) {
            $user = User::paginate(10);
        }elseif (auth()->user()->hasrole('Ketua RT')) {
            $id = RT::find(auth()->user()->rt->id)->id;
            $user = User::whereHas('nik', function ($query) use ($id) {
                $query->where('rukun_tetangga_id', $id);
            })->paginate(10);
        }
        
		return view('dashboard.penduduk.index',['user' => $user]);
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function penduduk_create()
	{if (auth()->user()->hasPermissionTo('penduduk-create')) {
        
        $user = User::all();
        
        if (auth()->user()->hasrole('Admin')) {
            $dusun = Dusun::all();
        }elseif (auth()->user()->hasrole('Ketua RT')) {
            $dusun = Dusun::where('id', auth()->user()->rt->rukun_warga->dusun_id)->get();
        }
        
		return view('dashboard.penduduk.create', ['user' => $user, 'dusun' => $dusun]);
	}else{return abort(403);}}
    
    public function penduduk_store(Request $request)
    {if (auth()->user()->hasPermissionTo('penduduk-create')) {
        
        $this->validate($request,[
            'name' => 'required',
            'nik' => 'required|unique:nomor_induk_kependudukan,code',
            'gender' => 'required',
            'place' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'dusun' => 'required',
            'rw' => 'required',
            'rt' => 'required',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);
        
        NIK::create([
            'user_id' => $user->id,
            'father_id' => $request->dad,
            'mother_id' => $request->mom,
            'code' => $request->nik,
            'place_of_birth' => $request->place,
            'date_of_birth' => $request->dob,
            'gender' => $request->gender,
            'blood_type' => $request->blood,
            'address' => $request->address,
            'dusun_id' => $request->dusun,
            'rukun_warga_id' => $request->rw,
            'rukun_tetangga_id' => $request->rt,
            'religion' => $request->religion,
            'married_status' => $request->married,
            'job_status' => $request->job,
        ]);

        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil di tambahkan!');
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function penduduk_edit($id)
	{
		$penduduk = User::find($id);
        $user = User::all();
        $data_dusun = Dusun::find($penduduk->nik->dusun_id);
        $data_rw = RW::find($penduduk->nik->rukun_warga_id);
        $data_rt = RT::find($penduduk->nik->rukun_tetangga_id);
        
        if (auth()->user()->hasrole('Admin')) {
            $dusun = Dusun::all();
        }elseif (auth()->user()->hasrole('Ketua RT')) {
            $dusun = Dusun::where('id', auth()->user()->rt->rukun_warga->dusun_id)->get();
        }
        
		return view('dashboard.penduduk.edit',['user' => $user, 'penduduk' => $penduduk, 'dusun' => $dusun, 'data_dusun' => $data_dusun, 'data_rw' => $data_rw, 'data_rt' => $data_rt]);
	}
	
	public function penduduk_update(Request $request, $id)
    {
		$user = User::find($id);
		
        $this->validate($request,[
            'name' => 'required',
            'nik' => 'required|unique:nomor_induk_kependudukan,code',
            'gender' => 'required',
            'place' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'dusun' => 'required',
            'rw' => 'required',
            'rt' => 'required',
        ]);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->save();

		$nik = NIK::where('user_id', $id)->first();
		$nik->father_id = $request->dad;
		$nik->mother_id = $request->mom;
		$nik->code = $request->nik;
		$nik->blood_type = $request->blood;
		$nik->dusun_id = $request->dusun;
		$nik->rukun_warga_id = $request->rw;
		$nik->rukun_tetangga_id = $request->rt;
		$nik->religion = $request->religion;
		$nik->married_status = $request->married;
		$nik->job_status = $request->job;
		$nik->place_of_birth = $request->place;
		$nik->date_of_birth = $request->dob;
		$nik->gender = $request->gender;
		$nik->address = $request->address;
		$nik->save();
		
		if(!empty($request->password)) {
			$user->password = Hash::make($request->password);
			$user->save();
		}
		
        return redirect()->route('penduduk')->with('success', 'Data penduduk berhasil di ubah!');
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function penduduk_destroy($id)
    {if (auth()->user()->hasPermissionTo('penduduk-create')) {
        
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil di hapus!');
    }else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function penduduk_filter_kurangmampu()
	{
        if (auth()->user()->hasrole('Admin')) {
            $user = User::whereHas('warga_kurang_mampu', function ($query) {
                $query->where('id', '>', 0);
            })->paginate(10);
        }elseif (auth()->user()->hasrole('Ketua RT')) {
            
            $id = RT::find(auth()->user()->rt->id)->id;
            
            $user = User::whereHas('warga_kurang_mampu', function ($query) use ($id){
                $query->where('id', '>', 0);
            })->whereHas('nik', function ($query) use ($id){
                $query->where('rukun_tetangga_id', $id);
            })->paginate(10);
        }
        
		return view('dashboard.penduduk.kurang-mampu',['user' => $user]);
	}
    
    public function penduduk_toggle_warga($id)
	{
		$user = User::find($id);
        
        if($user->hasrole('Warga')) {
            $user->removeRole('Warga');
        }else {
            $user->assignRole('Warga');
        }
		
		return redirect()->back();
	}
    
    public function penduduk_toggle_kurangmampu($id)
	{
        $data = KurangMampu::where('user_id', $id)->get();
            
        if(count($data) > 0) {
            $data = KurangMampu::where('user_id', $id)->first();
            $data->delete();
        }else {
            KurangMampu::create([
                'user_id' => $id,
            ]);
        }
		
		return redirect()->back();
	}
    
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- RUKUN TETANGGA
    
    public function rt()
	{if (auth()->user()->hasPermissionTo('rukun-tetangga')) {
        
        if (auth()->user()->hasrole('Admin')) {
            $rt = RT::paginate(10);
        }elseif (auth()->user()->hasrole('Ketua RW')) {
            $rw = RW::where('user_id', auth()->user()->id)->first();
            $rt = RT::where('rukun_warga_id', $rw->id)->paginate(10);
        }
		
		return view('dashboard.rukun-tetangga.index',['rt' => $rt]);
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function rt_create()
	{if (auth()->user()->hasPermissionTo('rukun-tetangga-create')) {
        
        $user = User::all();
        
        if (auth()->user()->hasrole('Admin')) {
            $dusun = Dusun::all();
        }elseif (auth()->user()->hasrole('Ketua RW')) {
            $dusun = Dusun::where('id', auth()->user()->rw->dusun_id)->get();
        }
        
		return view('dashboard.rukun-tetangga.create',['user' => $user, 'dusun' => $dusun]);
	}else{return abort(403);}}
    
    public function rt_store(Request $request)
    {if (auth()->user()->hasPermissionTo('rukun-tetangga-create')) {
        
        $this->validate($request,[
            'dusun' => 'required',
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
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function rt_edit($id)
	{if (auth()->user()->hasPermissionTo('rukun-tetangga-edit')) {
        
		$rt = RT::find($id);
        $user = User::all();
        
        if (auth()->user()->hasrole('Admin')) {
            $dusun = Dusun::all();
            $rw = RW::where('dusun_id', $rt->rukun_warga->dusun_id)->get();
        }elseif (auth()->user()->hasrole('Ketua RW')) {
            $dusun = Dusun::where('id', auth()->user()->rw->dusun_id)->get();
            $rw = RW::where('id', auth()->user()->rw->id)->get();
        }
        
		return view('dashboard.rukun-tetangga.edit',['user' => $user, 'dusun' => $dusun, 'rt' => $rt, 'rw' => $rw]);
	}else{return abort(403);}}
	
    public function rt_update(Request $request, $id)
    {if (auth()->user()->hasPermissionTo('rukun-tetangga-edit')) {
        
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
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
	public function rt_destroy($id)
    {if (auth()->user()->hasPermissionTo('rukun-tetangga-edit')) {
        
        $rt = RT::find($id);
        
        if($rt->user_id > 0) {
            $user = User::find($rt->user_id);
            $user->removeRole('Ketua RT');
        }
        
        $rt->delete();
        
        return redirect()->route('rt')->with('success', 'RT berhasil di hapus!');
    }else{return abort(403);}}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- RUKUN WARGA
    
	public function rw()
	{if (auth()->user()->hasPermissionTo('rukun-warga')) {

        $rw = RW::paginate(10);
        
		if (auth()->user()->hasrole('Kepala Dusun')) {
            $dusun = Dusun::where('user_id', auth()->user()->id)->first();
            $rw = RW::where('dusun_id', $dusun->id)->paginate(10);
        }
        
		return view('dashboard.rukun-warga.index',['rw' => $rw]);
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
    public function rw_create()
	{if (auth()->user()->hasPermissionTo('rukun-warga-create')) {
        
        $dusun = Dusun::all();
        $user = User::all();
        
        if (auth()->user()->hasrole('Kepala Dusun')) {
            $dusun = Dusun::where('user_id', auth()->user()->id)->get();
        }
        
		return view('dashboard.rukun-warga.create',['user' => $user, 'dusun' => $dusun]);
	}else{return abort(403);}}
    
    public function rw_store(Request $request)
    {if (auth()->user()->hasPermissionTo('rukun-warga-create')) {
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
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function rw_edit($id)
	{if (auth()->user()->hasPermissionTo('rukun-warga-edit')) {
        
		$rw = RW::find($id);
        $dusun = Dusun::all();
        $user = User::all();
        
        if (auth()->user()->hasrole('Kepala Dusun')) {
            $dusun = Dusun::where('user_id', auth()->user()->id)->get();
        }
        
		return view('dashboard.rukun-warga.edit',['user' => $user, 'rw' => $rw, 'dusun' => $dusun]);
	}else{return abort(403);}}
    
    public function rw_update(Request $request, $id)
    {if (auth()->user()->hasPermissionTo('rukun-warga-edit')) {
        
		$this->validate($request,[
            'number' => 'required',
            'dusun' => 'required',
            'user' => 'required',
        ]);
        
        $rw = RW::find($id);
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
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function rw_destroy($id)
    {if (auth()->user()->hasPermissionTo('rukun-warga-destroy')) {
        
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
    }else{return abort(403);}}
    
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- DUSUN
    
	public function dusun()
	{if (auth()->user()->hasPermissionTo('dusun')) {
		$dusun = Dusun::paginate(10);
		
		return view('dashboard.dusun.index',['dusun' => $dusun]);
	}else{return abort(403);}}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function dusun_create()
	{if (auth()->user()->hasPermissionTo('dusun-create')) {
        
        $user = User::all();
        
		return view('dashboard.dusun.create',['user' => $user]);
	}else{return abort(403);}}
    
    public function dusun_store(Request $request)
    {if (auth()->user()->hasPermissionTo('dusun-create')) {
        
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
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function dusun_edit($id)
	{if (auth()->user()->hasPermissionTo('dusun-edit')) {
        
		$dusun = Dusun::find($id);
        $user = User::all();
        
		return view('dashboard.dusun.edit',['user' => $user, 'dusun' => $dusun]);
	}else{return abort(403);}}
    
    public function dusun_update(Request $request, $id)
    {if (auth()->user()->hasPermissionTo('dusun-edit')) {
        
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
	}else{return abort(403);}}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
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
                        $user->removeRole('Kepala Dusun');
                    }
                }
                $user = User::find($r->user_id);
                $user->removeRole('Kepala Dusun');
            }
        }
        $dusun->delete();
        return redirect()->route('dusun')->with('success', 'Dusun berhasil di hapus!');
    }
    
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- JURNALIS
    
    public function jurnalis()
	{
		$jurnalis = Jurnalis::paginate(10);
		
		return view('dashboard.jurnalis.index',['jurnalis' => $jurnalis]);
	}
    
    public function jurnalis_create()
	{
        $user = User::all();
		return view('dashboard.jurnalis.create',['user' => $user]);
	}
    
    public function jurnalis_store(Request $request)
    {
        $this->validate($request,[
            'user' => 'required',
        ]);
        
        $user = User::find($request->user);
        $user->assignRole('Jurnalis');
        
        $jurnalis = Jurnalis::create([
            'code' => 'BJ'.str_pad($request->user, 4, '0', STR_PAD_LEFT),
            'user_id' =>  $request->user,
        ]);
        
        return redirect()->route('jurnalis')->with('success', 'Jurnalis berhasil di tambahkan!');
	}
    
    public function jurnalis_destroy($id)
    {
        $jurnalis = Jurnalis::find($id);
        $user = User::find($jurnalis->user_id);
        $user->removeRole('Jurnalis');
        $jurnalis->delete();
        return redirect()->route('jurnalis')->with('success', 'Jurnalis berhasil di hapus!');
    }
}
