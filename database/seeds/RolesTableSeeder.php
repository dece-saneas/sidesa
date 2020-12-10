<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Kepala Dusun']);
        Role::create(['name' => 'RW']);
        Role::create(['name' => 'RT']);
        Role::create(['name' => 'Warga']);
        Role::create(['name' => 'Jurnalis']);
    }
}
