<?php
namespace App\Http\Resources;
use Illuminate\Http\Request; use Illuminate\Http\Resources\Json\JsonResource;
class PatientResource extends JsonResource { public function toArray(Request $request): array { return ['id'=>$this->id,'name'=>$this->user?->name,'email'=>$this->user?->email,'date_of_birth'=>$this->date_of_birth?->toDateString(),'address'=>$this->address,'phone'=>$this->phone,'photo'=>$this->photo]; } }
