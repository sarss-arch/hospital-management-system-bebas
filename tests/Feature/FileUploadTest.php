<?php
namespace Tests\Feature;
use App\Enums\UserRole; use App\Models\Patient; use App\Models\User; use Illuminate\Foundation\Testing\RefreshDatabase; use Illuminate\Http\UploadedFile; use Illuminate\Support\Facades\Storage; use Tests\TestCase;
class FileUploadTest extends TestCase { use RefreshDatabase; public function test_patient_can_upload_file(): void { Storage::fake('local'); $patient=Patient::factory()->for(User::factory()->create(['role'=>UserRole::PATIENT]))->create(); $this->actingAs($patient->user)->postJson('/api/v1/files/upload',['file'=>UploadedFile::fake()->image('ktp.png'),'fileable_type'=>'patient','fileable_id'=>$patient->id])->assertCreated(); } }
