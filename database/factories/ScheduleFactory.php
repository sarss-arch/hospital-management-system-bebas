<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class ScheduleFactory extends Factory { public function definition(): array { return ['day_of_week'=>'Monday','start_time'=>'08:00:00','end_time'=>'12:00:00']; } }
