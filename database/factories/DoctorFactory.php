<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class DoctorFactory extends Factory { public function definition(): array { return ['specialization'=>fake()->randomElement(['Umum','Anak','Gigi','THT']),'phone'=>'+62812'.fake()->numerify('########')]; } }
