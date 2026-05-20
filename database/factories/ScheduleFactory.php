<?php
namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    public function definition(): array
    {
        $days  = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        $hours = ['08:00:00','09:00:00','10:00:00','13:00:00','14:00:00','15:00:00'];
        $start = fake()->unique()->randomElement($hours);

        return [
            'doctor_id'   => Doctor::factory(),
            'day_of_week' => fake()->randomElement($days),
            'start_time'  => $start,
            'end_time'    => '17:00:00',
        ];
    }
}
