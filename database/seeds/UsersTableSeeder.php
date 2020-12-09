<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
			'name' => 'Admin Pertama',
			'email' => 'admin@sidesa.id',
			'password' => Hash::make('12345678'),
		]);
    }
}
