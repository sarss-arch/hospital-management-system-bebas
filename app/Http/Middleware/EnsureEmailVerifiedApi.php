<?php
namespace App\Http\Middleware;
use App\Http\Responses\ApiResponse; use Closure; use Illuminate\Http\Request;
class EnsureEmailVerifiedApi { public function handle(Request $request, Closure $next) { if (!$request->user()?->hasVerifiedEmail()) return ApiResponse::error('Email belum diverifikasi.',403); return $next($request); } }
