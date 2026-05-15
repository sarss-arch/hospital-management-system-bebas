<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class PatientFactory extends Factory { public function definition(): array { return ['date_of_birth'=>fake()->dateTimeBetween('-70 years','-5 years')->format('Y-m-d'),'address'=>fake('id_ID')->address(),'phone'=>'+62813'.fake()->numerify('########')]; } }
