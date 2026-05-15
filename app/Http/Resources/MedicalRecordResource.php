<?php
namespace App\Http\Resources;
use Illuminate\Http\Request; use Illuminate\Http\Resources\Json\JsonResource;
class MedicalRecordResource extends JsonResource { public function toArray(Request $request): array { return ['id'=>$this->id,'appointment_id'=>$this->appointment_id,'diagnosis'=>$this->diagnosis,'prescription'=>$this->prescription,'notes'=>$this->notes,'doctor_id'=>$this->doctor_id,'created_at'=>$this->created_at?->toISOString()]; } }
