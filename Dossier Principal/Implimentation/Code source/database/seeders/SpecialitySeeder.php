<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities = [
            'Cardiology',
            'Neurology',
            'Pediatrics',
            'Dermatology',
            'Orthopedics',
            'Gynecology',
            'Ophthalmology',
            'Psychiatry'
        ];
    
        foreach ($specialities as $name) {
            DB::table('speciality')->insert([
                'speciality_name' => $name,
                'created_at' => Carbon::now()->format('Y-m-d'),
                'updated_at' => Carbon::now()->format('Y-m-d'), // or Carbon::now()->format('Y-m-d')
            ]);
        }
    }
}
