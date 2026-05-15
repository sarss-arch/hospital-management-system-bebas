<?php
namespace Database\Seeders;
use App\Models\Appointment; use App\Models\Doctor; use App\Models\Patient; use Illuminate\Database\Seeder;
class AppointmentsSeeder extends Seeder { public function run(): void { $patients=Patient::all(); $doctors=Doctor::with('schedules')->get(); for($i=1;$i<=200;$i++){ $doctor=$doctors->random(); $schedule=$doctor->schedules->random(); Appointment::firstOrCreate(['patient_id'=>$patients->random()->id,'doctor_id'=>$doctor->id,'schedule_id'=>$schedule->id,'appointment_date'=>now()->addDays(rand(1,30))->toDateString(),'complaint'=>'Keluhan '.$i],['status'=>fake()->randomElement(['pending','confirmed']),'queue_number'=>$i]); } } }
