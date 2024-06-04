<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('types')->insert([
            ['name' => 'Trousers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shirt', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jacket', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sweater', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dress', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Skirt', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shorts', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'T-shirt', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blouse', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shoe', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'complement', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
