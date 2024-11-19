<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // How to reset id number manually
    // SET @count = 0;
    // UPDATE users SET id = @count:= @count + 1;


    public function run(): void
    {
      
    $this->call(AdminSeeder::class);

    }
}
