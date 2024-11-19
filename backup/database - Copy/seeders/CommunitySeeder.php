<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Community;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subsektors = [
            'Aplikasi (Programmer)',
            'Pengembang Permainan (Game)',
            'Arsitektur',
            'Desain Interior',
            'Musik',
            'Seni Rupa',
            'Desain Produk',
            'Fashion',
            'Kuliner',
            'Film, Animasi dan Video',
            'Fotografi',
            'Desain Komunikasi Visual',
            'Televisi dan Radio',
            'Kriya',
            'Periklanan',
            'Seni Pertunjukan',
            'Penerbitan',
        ];

        // Gunakan hanya Community::create
        // foreach ($subsektors as $subsektor) {
        //     DB::table('communities')->insert([
        //         'community' => $subsektor,
        //     ]);
        // }

        foreach ($subsektors as $subsektor) {
            Community::updateOrCreate(['community' => $subsektor]);
        }
    }
}