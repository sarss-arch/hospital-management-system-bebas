<?php
namespace App\Mail;
use App\Models\Appointment; use Illuminate\Bus\Queueable; use Illuminate\Mail\Mailable; use Illuminate\Queue\SerializesModels;
class AppointmentBookedMail extends Mailable { use Queueable, SerializesModels; public function __construct(public Appointment $appointment){} public function build(){ return $this->subject('Konfirmasi Booking Appointment')->view('emails.appointment-booked'); } }
