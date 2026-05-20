<?php
namespace Database\Factories;

use App\Enums\AppointmentStatus;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        $doctor   = Doctor::factory()->create();
        $schedule = Schedule::factory()->for($doctor)->create();

        return [
            'patient_id'       => Patient::factory(),
            'doctor_id'        => $doctor->id,
            'schedule_id'      => $schedule->id,
            'appointment_date' => fake()->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'status'           => fake()->randomElement(AppointmentStatus::cases()),
            'complaint'        => fake('id_ID')->sentence(6),
        ];
    }
}
