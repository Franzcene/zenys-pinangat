<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\products;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        products::create(['name' => 'Product 1']);
        products::create(['name' => 'Product 2']);
        products::create(['name' => 'Product 3']);
    }
}
