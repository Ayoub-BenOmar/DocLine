<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Agadir',
            'Marrakech',
            'Rabat',
            'Casablanca',
            'Tangier',
            'Fes',
            'Laayoune'
        ];

        foreach($cities as $city){
            DB::table('cities')->insert([
                'city'=>$city,
                'created_at'=>Carbon::now()->format('Y-m-d'),
                'updated_at'=>Carbon::now()->format('Y-m-d'),
            ]);
        }
    }
}
