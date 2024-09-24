<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customers;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        customers::create(['name' => 'Customer 1']);
        customers::create(['name' => 'Customer 2']);
        customers::create(['name' => 'Customer 3']);
    }
}
