<?php
namespace App\Console\Commands;
use App\Models\Appointment; use Illuminate\Console\Command; use Illuminate\Support\Facades\Mail;
class SendAppointmentReminders extends Command { protected $signature='appointments:send-reminders'; protected $description='Kirim reminder H-1 appointment'; public function handle(): int { Appointment::with('patient.user','doctor.user','schedule')->whereDate('appointment_date', now()->addDay()->toDateString())->where('status','confirmed')->chunk(50, function($items){ foreach($items as $a) Mail::raw("Reminder appointment besok dengan {$a->doctor->user->name} jam {$a->schedule->start_time}", fn($m)=>$m->to($a->patient->user->email)->subject('Reminder Appointment H-1')); }); return self::SUCCESS; } }
