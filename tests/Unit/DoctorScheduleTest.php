<?php
namespace Tests\Unit;

use App\Enums\UserRole;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DoctorScheduleTest extends TestCase
{
    use RefreshDatabase;

    public function test_doctor_can_have_multiple_schedules(): void
    {
        $doctor = Doctor::factory()
            ->for(User::factory()->create(['role' => UserRole::DOCTOR]))
            ->create();

        Schedule::factory()->count(3)->for($doctor)->create();

        $this->assertCount(3, $doctor->schedules);
    }

    public function test_schedule_belongs_to_doctor(): void
    {
        $doctor   = Doctor::factory()
            ->for(User::factory()->create(['role' => UserRole::DOCTOR]))
            ->create();
        $schedule = Schedule::factory()->for($doctor)->create();

        $this->assertEquals($doctor->id, $schedule->doctor_id);
    }

    public function test_doctor_without_schedule_returns_empty(): void
    {
        $doctor = Doctor::factory()
            ->for(User::factory()->create(['role' => UserRole::DOCTOR]))
            ->create();

        $this->assertCount(0, $doctor->schedules);
    }
}
