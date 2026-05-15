<?php
namespace Database\Seeders;
use App\Models\Doctor; use App\Models\Schedule; use Illuminate\Database\Seeder;
class SchedulesSeeder extends Seeder { public function run(): void { $days=['Monday','Tuesday','Wednesday','Thursday','Friday']; Doctor::all()->each(function($d) use($days){ foreach(array_slice($days,0,3) as $day) Schedule::updateOrCreate(['doctor_id'=>$d->id,'day_of_week'=>$day,'start_time'=>'08:00:00','end_time'=>'12:00:00']); }); } }
