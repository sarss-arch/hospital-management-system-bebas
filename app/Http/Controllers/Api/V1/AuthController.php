<?php
namespace App\Http\Controllers\Api\V1;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            ...$request->safe()->only(['name', 'email', 'password']),
            'role'               => UserRole::PATIENT,
            'email_verified_at' => now(),
        ]);

        $patient = Patient::create(
            ['user_id' => $user->id] + $request->safe()->only(['date_of_birth', 'address', 'phone'])
        );

        $token = $user->createToken('api-token')->plainTextToken;

        return ApiResponse::success(['token' => $token, 'user' => $user, 'patient' => $patient], 'Registrasi berhasil', 201);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['email' => 'Email atau password salah.']);
        }

        return ApiResponse::success([
            'token' => $user->createToken('api-token')->plainTextToken,
            'user'  => $user,
        ], 'Login berhasil');
    }

    public function logout()
    {
        $token = request()->user()->currentAccessToken();

        if ($token instanceof PersonalAccessToken) {
            $token->delete();
        }

        return ApiResponse::success(null, 'Logout berhasil');
    }
}
