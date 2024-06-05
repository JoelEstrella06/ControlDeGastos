<?php

namespace Database\Seeders;

use App\Models\Gastos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GastosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gastos::factory()->count(50)->create();
    }
}
