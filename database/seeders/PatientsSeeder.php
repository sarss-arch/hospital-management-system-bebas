<?php
namespace Database\Seeders;
use App\Enums\UserRole; use App\Models\Patient; use App\Models\User; use Illuminate\Database\Seeder;
class PatientsSeeder extends Seeder { public function run(): void { for($i=1;$i<=50;$i++){ $u=User::updateOrCreate(['email'=>'patient'.$i.'@klinik.test'],['name'=>fake('id_ID')->name(),'password'=>'password','role'=>UserRole::PATIENT,'email_verified_at'=>now()]); Patient::updateOrCreate(['user_id'=>$u->id],['date_of_birth'=>fake()->dateTimeBetween('-60 years','-5 years')->format('Y-m-d'),'address'=>fake('id_ID')->address(),'phone'=>'+62813'.str_pad($i,8,'0',STR_PAD_LEFT)]); } } }
