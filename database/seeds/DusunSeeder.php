<?php

use Illuminate\Database\Seeder;
use App\Models\Dusun;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dusun1 = Dusun::create([
			'name' => 'Dusun Selatan',
			'user_id' => 3,
		]);
		
		$dusun2 = Dusun::create([
			'name' => 'Dusun Utara',
			'user_id' => 4,
		]);
    }
}
