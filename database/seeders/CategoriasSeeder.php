<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'=>'Alimentos'
        ]);
        DB::table('categories')->insert([
            'name'=>'Gastos médicos'
        ]);
        DB::table('categories')->insert([
            'name'=>'Transporte'
        ]);
        DB::table('categories')->insert([
            'name'=>'Otros'
        ]);
    }
}
