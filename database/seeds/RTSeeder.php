<?php

use Illuminate\Database\Seeder;
use App\Models\RT;

class RTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rt1 = RT::create([
			'name' => 'RT 001',
			'rukun_warga_id' => 1,
			'user_id' => 9,
		]);
		
		$rt2 = RT::create([
			'name' => 'RT 001',
			'rukun_warga_id' => 2,
			'user_id' => 10,
		]);
		
		$rt3 = RT::create([
			'name' => 'RT 001',
			'rukun_warga_id' => 3,
			'user_id' => 11,
		]);
		
		$rt4 = RT::create([
			'name' => 'RT 001',
			'rukun_warga_id' => 4,
			'user_id' => 12,
		]);
    }
}
