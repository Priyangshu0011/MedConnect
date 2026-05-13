<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@hospital.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Patient
        $patient = User::create([
            'name' => 'John Doe',
            'email' => 'patient@hospital.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
        ]);

        // Create Departments
        $cardiology = Department::create(['name' => 'Cardiology', 'description' => 'Heart related diseases']);
        $neurology = Department::create(['name' => 'Neurology', 'description' => 'Brain and nervous system']);

        // Create Doctor User
        $doctorUser = User::create([
            'name' => 'Dr. Smith',
            'email' => 'doctor@hospital.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);

        // Create Doctor Profile
        Doctor::create([
            'user_id' => $doctorUser->id,
            'department_id' => $cardiology->id,
            'qualification' => 'MBBS, MD',
            'available_days' => 'Mon,Wed,Fri',
        ]);
    }
}
