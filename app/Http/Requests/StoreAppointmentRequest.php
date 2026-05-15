<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreAppointmentRequest extends FormRequest { public function authorize(): bool { return $this->user()?->isRole('patient') ?? false; } public function rules(): array { return ['doctor_id'=>['required','exists:doctors,id'],'schedule_id'=>['required','exists:schedules,id'],'appointment_date'=>['required','date','after_or_equal:today'],'complaint'=>['required','string','min:5']]; } }
