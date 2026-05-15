<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('schedules', function(Blueprint $t){ $t->id(); $t->foreignId('doctor_id')->constrained()->cascadeOnDelete(); $t->string('day_of_week'); $t->time('start_time'); $t->time('end_time'); $t->timestamps(); $t->unique(['doctor_id','day_of_week','start_time','end_time']); }); } public function down(): void { Schema::dropIfExists('schedules'); } };
