<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolNames = ['SMKN 1 Kotabaru', 'SMKN 2 Kotabaru', 'SMAN 1 Kotabaru', 'SMAN 2 Kotabaru'];

        foreach ($schoolNames as $name) {
            School::create(['school' => $name]);
        }
    }
}
