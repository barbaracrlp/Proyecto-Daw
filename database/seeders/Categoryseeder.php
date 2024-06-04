<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            ['name' => 'Denim', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Modern', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Vintage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'White', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Casual', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Formal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sportswear', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Colourful', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
