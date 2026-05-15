<?php
namespace App\Models;
use App\Enums\AppointmentStatus; use Illuminate\Database\Eloquent\Factories\HasFactory; use Illuminate\Database\Eloquent\Model;
class Appointment extends Model { use HasFactory; protected $fillable=['patient_id','doctor_id','schedule_id','appointment_date','status','complaint','queue_number']; protected $casts=['appointment_date'=>'date','status'=>AppointmentStatus::class]; public function patient(){return $this->belongsTo(Patient::class);} public function doctor(){return $this->belongsTo(Doctor::class);} public function schedule(){return $this->belongsTo(Schedule::class);} public function medicalRecord(){return $this->hasOne(MedicalRecord::class);} }
