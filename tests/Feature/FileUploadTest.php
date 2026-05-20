<?php
namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_can_upload_file(): void
    {
        Storage::fake('private');

        $patient = Patient::factory()
            ->for(User::factory()->create(['role' => UserRole::PATIENT]))
            ->create();

        $file = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');

        $this->actingAs($patient->user)
            ->postJson('/api/v1/files/upload', [
                'file'          => $file,
                'fileable_type' => 'patient',
                'fileable_id'   => $patient->id,
            ])
            ->assertCreated();
    }

    public function test_unauthorized_user_cannot_download_file(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->getJson('/api/v1/files/999')
            ->assertNotFound();
    }
}
