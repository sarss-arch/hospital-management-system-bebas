<?php
namespace Database\Seeders;
use App\Enums\UserRole; use App\Models\User; use Illuminate\Database\Seeder;
class UsersSeeder extends Seeder { public function run(): void { User::updateOrCreate(['email'=>'admin@klinik.test'],['name'=>'Admin Klinik','password'=>'password','role'=>UserRole::ADMIN,'email_verified_at'=>now()]); } }
