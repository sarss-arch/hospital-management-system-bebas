<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Responses\ApiResponse;
use App\Models\Appointment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    // INNER JOIN: appointment + dokter + pasien
    public function index(): JsonResponse
    {
        $appointments = DB::table('appointments')
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('users as patient_users', 'patients.user_id', '=', 'patient_users.id')
            ->join('users as doctor_users', 'doctors.user_id', '=', 'doctor_users.id')
            ->select(
                'appointments.id',
                'appointments.appointment_date',
                'appointments.status',
                'appointments.complaint',
                'patient_users.name as patient_name',
                'doctor_users.name as doctor_name'
            )
            ->paginate(10);

        return ApiResponse::success($appointments);
    }

    public function store(StoreAppointmentRequest $request): JsonResponse
    {
        $appointment = Appointment::create([
            'patient_id'       => auth()->user()->patient->id,
            'doctor_id'        => $request->doctor_id,
            'schedule_id'      => $request->schedule_id,
            'appointment_date' => $request->appointment_date,
            'complaint'        => $request->complaint,
            'status'           => 'pending',
        ]);

        return ApiResponse::success(new AppointmentResource($appointment->load(['patient.user', 'doctor.user', 'schedule'])), 'Appointment berhasil dibuat', 201);
    }

    public function show(Appointment $appointment): JsonResponse
    {
        return ApiResponse::success(new AppointmentResource($appointment->load(['patient.user', 'doctor.user', 'schedule'])));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment): JsonResponse
    {
        $appointment->update($request->validated());

        return ApiResponse::success(new AppointmentResource($appointment->load(['patient.user', 'doctor.user', 'schedule'])));
    }

    public function destroy(Appointment $appointment): JsonResponse
    {
        $appointment->delete();

        return ApiResponse::success(null, 'Appointment berhasil dihapus');
    }
}
