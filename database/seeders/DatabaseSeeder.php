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

        // Hidroponik::create([
        //     'ppm_id'        => 16,
        //     'code'          => 'local-001'
        // ]);

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

        // Data::create([
        //     'hidroponik_id' =>1,
        //     'tanggal'   =>'2024-02-02',
        //     'jumlah'    =>200,
        //     'volume'    =>25,
        //     'larutan'   =>12.7,
        //     'ppm'       =>200,
        //     'kondisi'   =>'baik'
        // ]);
    }
}
