<?php

use Illuminate\Database\Seeder;
use App\Models\RW;

class RWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rw1 = RW::create([
			'name' => 'RW 001',
			'dusun_id' => 1,
			'user_id' => 5,
		]);
		
		$rw2 = RW::create([
			'name' => 'RW 002',
			'dusun_id' => 1,
			'user_id' => 6,
		]);
		
		$rw3 = RW::create([
			'name' => 'RW 001',
			'dusun_id' => 2,
			'user_id' => 7,
		]);
		
		$rw4 = RW::create([
			'name' => 'RW 002',
			'dusun_id' => 2,
			'user_id' => 8,
		]);
    }
}
