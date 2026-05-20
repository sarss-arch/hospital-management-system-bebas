<?php
namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalRecordFactory extends Factory
{
    public function definition(): array
    {
        return [
            'appointment_id' => Appointment::factory(),
            'doctor_id'      => Doctor::factory(),
            'diagnosis'      => fake('id_ID')->sentence(5),
            'prescription'   => fake('id_ID')->sentence(8),
            'notes'          => fake('id_ID')->paragraph(),
        ];
    }
}
