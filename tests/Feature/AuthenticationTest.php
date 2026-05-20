<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_can_register(): void
    {
        $this->postJson('/api/v1/auth/register', [
            'name'                  => 'Budi',
            'email'                 => 'budi@test.com',
            'password'              => 'password',
            'password_confirmation' => 'password',
        ])->assertCreated()->assertJsonPath('status', 'success');
    }

    public function test_login_validation(): void
    {
        $this->postJson('/api/v1/auth/login', [
            'email'    => 'none@test.com',
            'password' => 'wrong',
        ])->assertStatus(422);
    }

    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'email'    => 'login@test.com',
            'password' => Hash::make('password'),
        ]);

        $this->postJson('/api/v1/auth/login', [
            'email'    => 'login@test.com',
            'password' => 'password',
        ])
            ->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonStructure(['data' => ['token']]);
    }

    public function test_user_can_logout(): void
    {
        $user  = User::factory()->create();
        $token = $user->createToken('api-token')->plainTextToken;

        $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/v1/auth/logout')
            ->assertOk();
    }
}
