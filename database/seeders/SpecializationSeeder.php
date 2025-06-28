<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            'Aerobic Semarangan',
            'Aerobic Zumbar',
            'Yoga',
            'Pilates',
            'RL Sex Exercise',
            'Stepobic',
            'Belajar Teknik Latihan Dasar',
            'Program Menaikan Massa Otot',
            'Program Mengikis Masa Lemak',
            'Workout',
            'Aerobic',
            'Zumba',
            'Aeroboxing'
        ];

        foreach ($specializations as $specialization) {
            Specialization::create(['name' => $specialization]);
        }
    }
}
