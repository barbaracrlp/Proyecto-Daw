<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'surname1' => 'admin',
        //     'surname2' => 'admin',
        //     'username' => 'Admin',
        //     'email' => 'admin@admin.net',
        //     'password' => Hash::make('admin123'), // Hashear la contraseña
        //     'phone' => '1234567890',
        //     'is_designer' => true,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'surname1' => 'admin',
                'surname2' => 'admin',
                'username' => 'Admin',
                'email' => 'admin@admin.net',
                'password' => Hash::make('admin123'), // Hashear la contraseña
                'phone' => '1234567890',
                'is_designer' => true,
                'brand'=>'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Buyer',
                'surname1' => 'One',
                'surname2' => 'Example',
                'username' => 'buyer1',
                'email' => 'buyer@example.com',
                'password' => Hash::make('12345678'), // Hashear la contraseña
                'phone' => '0987654321',
                'is_designer' => false,
                'brand'=>null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Designer',
                'surname1' => 'Two',
                'surname2' => 'Example',
                'username' => 'user2',
                'email' => 'designer@example.com',
                'password' => Hash::make('87654321'), // Hashear la contraseña
                'phone' => '1122334455',
                'is_designer' => true,
                'brand'=>'designer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
