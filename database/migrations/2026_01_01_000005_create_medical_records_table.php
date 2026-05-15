<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('medical_records', function(Blueprint $t){ $t->id(); $t->foreignId('appointment_id')->unique()->constrained()->cascadeOnDelete(); $t->text('diagnosis'); $t->text('prescription')->nullable(); $t->text('notes')->nullable(); $t->foreignId('doctor_id')->constrained()->restrictOnDelete(); $t->timestamps(); }); } public function down(): void { Schema::dropIfExists('medical_records'); } };
