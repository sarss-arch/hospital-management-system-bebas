<?php
namespace Database\Seeders;
use App\Models\Appointment; use App\Models\MedicalRecord; use Illuminate\Database\Seeder;
class MedicalRecordsSeeder extends Seeder { public function run(): void { Appointment::limit(100)->get()->each(function($a){ MedicalRecord::firstOrCreate(['appointment_id'=>$a->id],['diagnosis'=>fake('id_ID')->sentence(),'prescription'=>'Paracetamol 500mg jika demam','notes'=>'Kontrol ulang bila keluhan berlanjut','doctor_id'=>$a->doctor_id]); }); } }
