<?php
namespace Tests\Unit;
use App\Enums\AppointmentStatus; use PHPUnit\Framework\TestCase;
class AppointmentStatusTest extends TestCase { public function test_pending_can_be_confirmed_or_cancelled(): void { $this->assertTrue(AppointmentStatus::PENDING->canTransitionTo(AppointmentStatus::CONFIRMED)); $this->assertTrue(AppointmentStatus::PENDING->canTransitionTo(AppointmentStatus::CANCELLED)); $this->assertFalse(AppointmentStatus::PENDING->canTransitionTo(AppointmentStatus::COMPLETED)); } public function test_completed_is_final(): void { $this->assertFalse(AppointmentStatus::COMPLETED->canTransitionTo(AppointmentStatus::CANCELLED)); } }
