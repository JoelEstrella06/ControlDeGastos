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
            'name'=>'Alimentos',
            'color'=>fake()->hexColor()
        ]);
        DB::table('categories')->insert([
            'name'=>'Gastos médicos',
            'color'=>fake()->hexColor()
        ]);
        DB::table('categories')->insert([
            'name'=>'Transporte',
            'color'=>fake()->hexColor()
        ]);
        DB::table('categories')->insert([
            'name'=>'Otros',
            'color'=>fake()->hexColor()
        ]);
    }
}
