<?php
namespace App\Http\Resources;
use Illuminate\Http\Request; use Illuminate\Http\Resources\Json\JsonResource;
class DoctorResource extends JsonResource { public function toArray(Request $request): array { return ['id'=>$this->id,'name'=>$this->user?->name,'email'=>$this->user?->email,'specialization'=>$this->specialization,'phone'=>$this->phone,'schedules'=>$this->whenLoaded('schedules')]; } }
