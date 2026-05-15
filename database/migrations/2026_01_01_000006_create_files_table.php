<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('files', function(Blueprint $t){ $t->id(); $t->morphs('fileable'); $t->string('file_path'); $t->string('original_name'); $t->string('mime_type'); $t->unsignedBigInteger('size'); $t->foreignId('uploaded_by')->constrained('users')->restrictOnDelete(); $t->timestamp('deleted_at')->nullable(); $t->timestamps(); }); } public function down(): void { Schema::dropIfExists('files'); } };
