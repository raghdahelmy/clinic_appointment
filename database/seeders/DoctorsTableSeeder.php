<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $specialties = Specialty::all();

        foreach ($specialties as $specialty) {
            Doctor::create([
                'name' => 'د. '  . ' أحمد'. ($specialty->name),
                'email' => strtolower($specialty->name) . '@clinic.com',
                'phone' => '0100000000' . $specialty->id,
                'specialty_id' => $specialty->id,
                'available_days' => ['Saturday', 'Monday', 'Wednesday'], // أو حسب رغبتك
            ]);
        }
    }
}
