<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest; use Illuminate\Validation\Rule;
class UploadFileRequest extends FormRequest { public function authorize(): bool { return $this->user()!=null; } public function rules(): array { return ['file'=>['required','file','mimetypes:image/jpeg,image/png,application/pdf','max:5120'], 'fileable_type'=>['required', Rule::in(['patient','doctor','medical_record'])], 'fileable_id'=>['required','integer','min:1']]; } }
