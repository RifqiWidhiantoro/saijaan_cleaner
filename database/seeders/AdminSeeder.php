<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Admin One',
                'email' => 'saijaan1@gmail.com',
                'password' => Hash::make('c6Rwa4.Xw6e4J!t'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Two',
                'email' => 'saijaan2@gmail.com',
                'password' => Hash::make('nV$yFKsYdAGSvj8'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Three',
                'email' => 'saijaan3@gmail.com',
                'password' => Hash::make('pugw7x59zcd!uK3'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Four',
                'email' => 'saijaan4@gmail.com',
                'password' => Hash::make('Qd7H.k#4SVQFLLu'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Five',
                'email' => 'saijaan5@gmail.com',
                'password' => Hash::make('6dR5Kk2.!sdU!Ax'),
                'role' => 'admin',
            ],
        ];

        foreach ($admins as $admin) {
            User::updateOrCreate(
                ['email' => $admin['email']], // Cek berdasarkan email agar tidak duplikat
                $admin
            );
        }
    }
}
