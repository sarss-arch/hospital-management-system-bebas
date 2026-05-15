<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreMedicalRecordRequest extends FormRequest { public function authorize(): bool { return $this->user()?->isRole('doctor') ?? false; } public function rules(): array { return ['appointment_id'=>['required','exists:appointments,id','unique:medical_records,appointment_id'],'diagnosis'=>['required','string'],'prescription'=>['nullable','string'],'notes'=>['nullable','string']]; } }
