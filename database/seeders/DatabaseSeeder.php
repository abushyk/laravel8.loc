<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Spain' => [
                'Andalusia',
                'Aragon',
                'Asturias',
                'Balearic Islands'
            ],
            'Italy' => [
                'Abruzzo',
                'Aosta Valley',
                'Apulia',
                'Basilicata',
                'Calabria',
                'Campania',
                'Emilia-Romagna'
            ],
            'Greece' => [
                'Attica',
                'Central Greece',
                'Central Macedonia',
                'Crete'
            ]
        ];

        foreach ($data as $country => $districts){
            $cid = DB::table('countries')->insertGetId([
                'name' => $country,
                'slug' => Str::slug($country)
            ]);
            foreach ($districts as $district){
                DB::table('regions')->insert([
                    'name' => $district,
                    'slug' => Str::slug($district),
                    'country_id' => $cid
                ]);
            }
        }
    }
}
