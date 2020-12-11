<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
