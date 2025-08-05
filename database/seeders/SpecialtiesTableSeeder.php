<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $specialties = ['عظام', 'قلب', 'جلدية', 'أسنان', 'مخ وأعصاب'];

        foreach ($specialties as $name) {
            Specialty::create(['name' => $name]);
        }
    }
    }
