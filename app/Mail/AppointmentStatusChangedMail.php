<?php
namespace App\Mail;
use App\Models\Appointment; use Illuminate\Bus\Queueable; use Illuminate\Mail\Mailable; use Illuminate\Queue\SerializesModels;
class AppointmentStatusChangedMail extends Mailable { use Queueable, SerializesModels; public function __construct(public Appointment $appointment){} public function build(){ return $this->subject('Status Appointment Diperbarui')->view('emails.appointment-status-changed'); } }
