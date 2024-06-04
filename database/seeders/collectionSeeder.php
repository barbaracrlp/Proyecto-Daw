<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class collectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('collections')->insert([
            [
                'user_id' => 1,
                'name' => 'Spring Collection',
                'description' => 'A fresh and vibrant collection for spring.',

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Summer Collection',
                'description' => 'Light and breezy designs for summer.',

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Winter Collection',
                'description' => 'Stylish and warm clothing for winter.',

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
