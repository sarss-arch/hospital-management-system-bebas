<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Resources\MedicalRecordResource;
use App\Http\Responses\ApiResponse;
use App\Models\MedicalRecord;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class MedicalRecordController extends Controller
{
    public function store(StoreMedicalRecordRequest $request): JsonResponse
    {
        $record = MedicalRecord::create([
            'appointment_id' => $request->appointment_id,
            'doctor_id'      => auth()->user()->doctor->id,
            'diagnosis'      => $request->diagnosis,
            'prescription'   => $request->prescription,
            'notes'          => $request->notes,
        ]);

        return ApiResponse::success(new MedicalRecordResource($record->load(['appointment', 'doctor.user'])), 'Rekam medis berhasil ditambahkan', 201);
    }

    // JOIN kompleks: rekam medis + appointment + dokter + pasien
    public function show(MedicalRecord $medicalRecord): JsonResponse
    {
        $record = DB::table('medical_records')
            ->join('appointments', 'medical_records.appointment_id', '=', 'appointments.id')
            ->join('doctors', 'medical_records.doctor_id', '=', 'doctors.id')
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('users as doctor_users', 'doctors.user_id', '=', 'doctor_users.id')
            ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')
            ->where('medical_records.id', $medicalRecord->id)
            ->select(
                'medical_records.id',
                'medical_records.diagnosis',
                'medical_records.prescription',
                'medical_records.notes',
                'medical_records.created_at',
                'doctor_users.name as doctor_name',
                'patient_users.name as patient_name',
                'appointments.appointment_date',
                'appointments.complaint'
            )
            ->first();

        return ApiResponse::success($record);
    }
}
