<?php
namespace App\Http\Middleware;
use App\Http\Responses\ApiResponse; use Closure; use Illuminate\Http\Request;
class RoleMiddleware { public function handle(Request $request, Closure $next, string ...$roles) { if (!$request->user() || !in_array($request->user()->role->value, $roles, true)) return ApiResponse::error('Forbidden: role tidak memiliki akses.',403); return $next($request); } }
