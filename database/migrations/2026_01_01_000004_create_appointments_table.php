<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { 
    Schema::create('appointments', function(Blueprint $t){ 
        $t->id(); 
        $t->foreignId('patient_id')->constrained()->restrictOnDelete(); 
        $t->foreignId('doctor_id')->constrained()->restrictOnDelete(); 
        $t->foreignId('schedule_id')->constrained()->restrictOnDelete(); 
        $t->date('appointment_date'); 
        $t->string('status')->default('pending'); 
        $t->text('complaint'); 
        $t->unsignedInteger('queue_number')->nullable(); 
        $t->timestamps(); 
        $t->index(['doctor_id','appointment_date','status']); }); 
        } public function down(): void { Schema::dropIfExists('appointments'); } };
