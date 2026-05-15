<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'doctor_id' => $this->doctor_id,
            'schedule_id' => $this->schedule_id,
            'appointment_date' => $this->appointment_date,
            'status' => is_object($this->status) && property_exists($this->status, 'value')
                ? $this->status->value
                : $this->status,
            'complaint' => $this->complaint,

            'patient' => $this->whenLoaded('patient', function () {
                return [
                    'id' => $this->patient->id,
                    'name' => $this->patient->user->name ?? null,
                    'email' => $this->patient->user->email ?? null,
                    'phone' => $this->patient->phone,
                ];
            }),

            'doctor' => $this->whenLoaded('doctor', function () {
                return [
                    'id' => $this->doctor->id,
                    'name' => $this->doctor->user->name ?? null,
                    'email' => $this->doctor->user->email ?? null,
                    'specialization' => $this->doctor->specialization,
                    'phone' => $this->doctor->phone,
                ];
            }),

            'schedule' => $this->whenLoaded('schedule', function () {
                return [
                    'id' => $this->schedule->id,
                    'day_of_week' => $this->schedule->day_of_week,
                    'start_time' => $this->schedule->start_time,
                    'end_time' => $this->schedule->end_time,
                ];
            }),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}