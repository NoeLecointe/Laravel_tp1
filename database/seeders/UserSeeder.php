<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Durand',
            'email' => 'duran@test.com',
            'password' => Hash::make('toto')
        ]);
        DB::table('users')->insert([
            'name' => 'Dupont',
            'email' => 'dupont@test.com',
            'password' => Hash::make('toto')
        ]);
    }
}
