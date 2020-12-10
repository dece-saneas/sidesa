<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\NIK;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		// Admin
		
        $admin = User::create([
			'name' => 'Admin 1',
			'email' => 'admin1@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 1,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$admin->assignRole('Admin');
		
		$admin2 = User::create([
			'name' => 'Admin 2',
			'email' => 'admin2@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 2,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$admin2->assignRole('Admin');
		
		
		// Kepala Dusun
		
        $kadus = User::create([
			'name' => 'Kepala Dusun 1',
			'email' => 'kadus1@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 3,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$kadus->assignRole('Kepala Dusun');
		
		$kadus2 = User::create([
			'name' => 'Kepala Dusun 2',
			'email' => 'kadus2@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 4,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$kadus2->assignRole('Kepala Dusun');
		
		
		// RW
		
        $rw = User::create([
			'name' => 'RW 1',
			'email' => 'rw1@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 5,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$rw->assignRole('RW');
		
		$rw2 = User::create([
			'name' => 'RW 2',
			'email' => 'rw2@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 6,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$rw2->assignRole('RW');
		
		$rw3 = User::create([
			'name' => 'RW 3',
			'email' => 'rw3@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 7,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$rw3->assignRole('RW');
		
		$rw4 = User::create([
			'name' => 'RW 4',
			'email' => 'rw4@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 8,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$rw4->assignRole('RW');
		
		// RT
		
        $rt = User::create([
			'name' => 'RT 1',
			'email' => 'rt1@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 9,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$rt->assignRole('RT');
		
		$rt2 = User::create([
			'name' => 'RT 2',
			'email' => 'rt2@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 10,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$rt2->assignRole('RT');
		
		$rt3 = User::create([
			'name' => 'RT 3',
			'email' => 'rt3@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 11,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$rt3->assignRole('RT');
		
		$rt4 = User::create([
			'name' => 'RT 4',
			'email' => 'rt4@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 12,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$rt4->assignRole('RT');
		
		
		// Warga
		
        $warga = User::create([
			'name' => 'Warga 1',
			'email' => 'warga1@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 13,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$warga->assignRole('Warga');
		
		$warga2 = User::create([
			'name' => 'Warga 2',
			'email' => 'warga2@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 14,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$warga2->assignRole('Warga');
		
		$warga3 = User::create([
			'name' => 'Warga 3',
			'email' => 'warga3@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 15,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$warga3->assignRole('Warga');
		
		$warga4 = User::create([
			'name' => 'Warga 4',
			'email' => 'warga4@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 16,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$warga4->assignRole('Warga');
		
		
		// Jurnalis
		
        $jurnalis = User::create([
			'name' => 'Jurnalis 1',
			'email' => 'jurnalis1@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 17,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Laki-Laki',
			'address' => 'Jl. Bulak I',
		]);
		$jurnalis->assignRole('Jurnalis');
		
		$jurnalis2 = User::create([
			'name' => 'Jurnalis 2',
			'email' => 'jurnalis2@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
		NIK::create([
			'user_id' => 18,
			'code' => Str::random(16),
			'place_of_birth' => 'Semarang',
			'date_of_birth' => '1997-03-17 03:26:20',
			'gender' => 'Perempuan',
			'address' => 'Jl. Bulak I',
		]);
		$jurnalis2->assignRole('Jurnalis');
    }
}
