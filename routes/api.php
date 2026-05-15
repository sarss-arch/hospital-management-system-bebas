<?php

use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\DoctorController;
use App\Http\Controllers\Api\V1\FileController;
use App\Http\Controllers\Api\V1\MedicalRecordController;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/auth/logout', [AuthController::class, 'logout']);
        Route::get('/doctors', [DoctorController::class, 'index']);
        Route::post('/files/upload', [FileController::class, 'store']);
        Route::get('/files/{file}', [FileController::class, 'show']);
        Route::delete('/files/{file}', [FileController::class, 'destroy']);

        Route::middleware('role:admin')->group(function () {
            Route::get('/patients', [PatientController::class, 'index']);
            Route::get('/reports/export', [ReportController::class, 'export']);
        });

        Route::get('/patients/{patient}', [PatientController::class, 'show']);
        Route::put('/patients/{patient}', [PatientController::class, 'update']);

        Route::middleware('role:patient')->post('/appointments', [AppointmentController::class, 'store']);
        Route::get('/appointments/{appointment}', [AppointmentController::class, 'show']);
        Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']);
        Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy']);

        Route::middleware('role:doctor')->post('/medical-records', [MedicalRecordController::class, 'store']);
        Route::get('/medical-records/{medicalRecord}', [MedicalRecordController::class, 'show']);
    });
});
