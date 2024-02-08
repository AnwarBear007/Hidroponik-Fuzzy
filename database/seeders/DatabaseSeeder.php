<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ppm;
use App\Models\Data;
use App\Models\User;
use App\Models\Hidroponik;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'      => 'abdurrohman farkhan',
            'email'     => 'abdurrohmanfarkhan@gmail.com',
            'password'  => Hash::make('password')
        ]);

        User::create([
            'name'      => 'quinsa angrycia',
            'email'     => 'quinsaangrycia@gmail.com',
            'password'  => Hash::make('password')
        ]);

        Ppm::create([
            'hidroponik'    => 'artichoke',
            'min'           => 560,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'asparagus',
            'min'           => 980,
            'max'           => 1200
        ]);

        Ppm::create([
            'hidroponik'    => 'bawang pre',
            'min'           => 980,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'bayam',
            'min'           => 1260,
            'max'           => 1610
        ]);

        Ppm::create([
            'hidroponik'    => 'brokoli',
            'min'           => 1960,
            'max'           => 2450
        ]);

        Ppm::create([
            'hidroponik'    => 'brussell kecambah',
            'min'           => 1750,
            'max'           => 2100
        ]);

        Ppm::create([
            'hidroponik'    => 'endive',
            'min'           => 1400,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'kailan',
            'min'           => 1050,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'kangkung',
            'min'           => 1050,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'kubis',
            'min'           => 1750,
            'max'           => 2100
        ]);

        Ppm::create([
            'hidroponik'    => 'kubis bunga',
            'min'           => 1750,
            'max'           => 2100
        ]);

        Ppm::create([
            'hidroponik'    => 'pakcoy',
            'min'           => 1050,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'sawi manis',
            'min'           => 1050,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'sawi pahit',
            'min'           => 840,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'seledri',
            'min'           => 1260,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'selada',
            'min'           => 560,
            'max'           => 840
        ]);

        Ppm::create([
            'hidroponik'    => 'silverbeet',
            'min'           => 1260,
            'max'           => 1610
        ]);

        Ppm::create([
            'hidroponik'    => 'cabe',
            'min'           => 1260,
            'max'           => 1540
        ]);

        Ppm::create([
            'hidroponik'    => 'kacang polong',
            'min'           => 980,
            'max'           => 1260
        ]);
        
        Ppm::create([
            'hidroponik'    => 'okra',
            'min'           => 1400,
            'max'           => 1680
        ]);
        
        Ppm::create([
            'hidroponik'    => 'tomat',
            'min'           => 1400,
            'max'           => 3500
        ]);
        
        Ppm::create([
            'hidroponik'    => 'terong',
            'min'           => 1750,
            'max'           => 2450
        ]);

        Ppm::create([
            'hidroponik'    => 'timun',
            'min'           => 1190,
            'max'           => 1750
        ]);

        Ppm::create([
            'hidroponik'    => 'timun jepang',
            'min'           => 1260,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'blueberry',
            'min'           => 1260,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'kismis hitam',
            'min'           => 980,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'kismis merah',
            'min'           => 1400,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'melon',
            'min'           => 1400,
            'max'           => 1750
        ]);

        Ppm::create([
            'hidroponik'    => 'markisa',
            'min'           => 840,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'nanas',
            'min'           => 1400,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'pisang',
            'min'           => 1260,
            'max'           => 1540
        ]);

        Ppm::create([
            'hidroponik'    => 'pepaya',
            'min'           => 840,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'strawberry',
            'min'           => 1260,
            'max'           => 1540
        ]);

        Ppm::create([
            'hidroponik'    => 'semangka',
            'min'           => 1260,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'african violet',
            'min'           => 840,
            'max'           => 1050
        ]);

        Ppm::create([
            'hidroponik'    => 'anthurium',
            'min'           => 1120,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'antirrhinim',
            'min'           => 1120,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'aphelendra',
            'min'           => 1260,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'aster',
            'min'           => 1260,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'begonia',
            'min'           => 980,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'bromeliads',
            'min'           => 560,
            'max'           => 840
        ]);

        Ppm::create([
            'hidroponik'    => 'caladium',
            'min'           => 1120,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'canna',
            'min'           => 1260,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'carnation',
            'min'           => 1260,
            'max'           => 2450
        ]);

        Ppm::create([
            'hidroponik'    => 'chrysanthemu',
            'min'           => 1400,
            'max'           => 1750
        ]);

        Ppm::create([
            'hidroponik'    => 'cymbidiums',
            'min'           => 420,
            'max'           => 560
        ]);

        Ppm::create([
            'hidroponik'    => 'dahlia',
            'min'           => 1050,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'dieffenbachia',
            'min'           => 1400,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'dracaena',
            'min'           => 1400,
            'max'           => 1480
        ]);

        Ppm::create([
            'hidroponik'    => 'ferns',
            'min'           => 1120,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'ficus',
            'min'           => 1120,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'freesia',
            'min'           => 700,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'impatiens',
            'min'           => 1260,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'gerbera',
            'min'           => 1400,
            'max'           => 1750
        ]);

        Ppm::create([
            'hidroponik'    => 'gladiolus',
            'min'           => 1400,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'monstera',
            'min'           => 1400,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'palms',
            'min'           => 1120,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'roses',
            'min'           => 1050,
            'max'           => 1750
        ]);

        Ppm::create([
            'hidroponik'    => 'stock',
            'min'           => 1120,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'basil(kemangi)',
            'min'           => 700,
            'max'           => 1120
        ]);

        Ppm::create([
            'hidroponik'    => 'chicory',
            'min'           => 1400,
            'max'           => 1600
        ]);

        Ppm::create([
            'hidroponik'    => 'chives',
            'min'           => 1260,
            'max'           => 1540
        ]);

        Ppm::create([
            'hidroponik'    => 'fennel',
            'min'           => 700,
            'max'           => 980
        ]);

        Ppm::create([
            'hidroponik'    => 'lavender',
            'min'           => 700,
            'max'           => 980
        ]);

        Ppm::create([
            'hidroponik'    => 'lemon balm',
            'min'           => 700,
            'max'           => 1120
        ]);

        Ppm::create([
            'hidroponik'    => 'marjoram',
            'min'           => 1120,
            'max'           => 1400
        ]);

        Ppm::create([
            'hidroponik'    => 'mint',
            'min'           => 1400,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'mustard cress',
            'min'           => 840,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'parsley',
            'min'           => 560,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'rosemary',
            'min'           => 700,
            'max'           => 1120
        ]);

        Ppm::create([
            'hidroponik'    => 'sage',
            'min'           => 700,
            'max'           => 1120
        ]);

        Ppm::create([
            'hidroponik'    => 'thyme',
            'min'           => 560,
            'max'           => 1120
        ]);

        Ppm::create([
            'hidroponik'    => 'water cress',
            'min'           => 280,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'bawang merah',
            'min'           => 980,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'bawang putih',
            'min'           => 980,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'kentang',
            'min'           => 1400,
            'max'           => 1750
        ]);

        Ppm::create([
            'hidroponik'    => 'lobak',
            'min'           => 1260,
            'max'           => 1680
        ]);

        Ppm::create([
            'hidroponik'    => 'talas',
            'min'           => 1750,
            'max'           => 2100
        ]);

        Ppm::create([
            'hidroponik'    => 'ubi',
            'min'           => 980,
            'max'           => 1260
        ]);

        Ppm::create([
            'hidroponik'    => 'ubi jalar',
            'min'           => 1400,
            'max'           => 1750
        ]);

        Ppm::create([
            'hidroponik'    => 'wortel',
            'min'           => 1120,
            'max'           => 1400
        ]);
    }
}
