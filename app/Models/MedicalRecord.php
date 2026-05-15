<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; use Illuminate\Database\Eloquent\Model;
class MedicalRecord extends Model { use HasFactory; protected $fillable=['appointment_id','diagnosis','prescription','notes','doctor_id']; public function appointment(){return $this->belongsTo(Appointment::class);} public function doctor(){return $this->belongsTo(Doctor::class);} public function files(){return $this->morphMany(File::class,'fileable');} }
