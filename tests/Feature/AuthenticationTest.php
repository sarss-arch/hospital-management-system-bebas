<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase; use Tests\TestCase;
class AuthenticationTest extends TestCase { use RefreshDatabase; public function test_patient_can_register(): void { $this->postJson('/api/v1/auth/register',['name'=>'Budi','email'=>'budi@test.com','password'=>'password','password_confirmation'=>'password'])->assertCreated()->assertJsonPath('status','success'); } public function test_login_validation(): void { $this->postJson('/api/v1/auth/login',['email'=>'none@test.com','password'=>'wrong'])->assertStatus(422); } }
