<?php
namespace Database\Seeders;
use App\Enums\UserRole; use App\Models\Doctor; use App\Models\User; use Illuminate\Database\Seeder;
class DoctorsSeeder extends Seeder { public function run(): void { $spec=['Umum','Anak','Gigi','Kandungan','Penyakit Dalam','Kulit','Mata','THT','Saraf','Jantung']; foreach($spec as $i=>$s){ $u=User::updateOrCreate(['email'=>'doctor'.($i+1).'@klinik.test'],['name'=>'Dr. '.$s.' Sehat','password'=>'password','role'=>UserRole::DOCTOR,'email_verified_at'=>now()]); Doctor::updateOrCreate(['user_id'=>$u->id],['specialization'=>$s,'phone'=>'+62812'.str_pad($i,8,'0')]); } } }
