<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'id'=> 1,
            'libelle'=> 'Roman'
        ]);
        DB::table('categories')->insert([
            'id'=> 2,
            'libelle'=> 'Fiction'
        ]);
        DB::table('categories')->insert([
            'id'=> 3,
            'libelle'=> 'Jeunesse'
        ]);

    }
}
