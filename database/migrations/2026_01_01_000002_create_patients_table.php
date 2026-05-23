<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { 
    Schema::create('patients', function(Blueprint $t){ $t->id(); 
    $t->foreignId('user_id')->unique()->constrained()->cascadeOnDelete(); 
    $t->date('date_of_birth')->nullable(); 
    $t->text('address')->nullable(); 
    $t->string('phone')->nullable(); 
    $t->string('photo')->nullable(); 
    $t->timestamps(); }); } public function down(): void { 
        Schema::dropIfExists('patients'); } };
