<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::where('email', 'admin@gmail.com')->first();

        if (!$user) {
    
            User::create([
                'email' => 'admin@gmail.com',
                'password' => Hash::make('rahasia'),
                'fullname' => 'admin name',
                'name' => 'admin',
                'role' => 'admin',
                'alamat' => 'Alamat dumy',
            ]);
        } else {
        }
    }
}
