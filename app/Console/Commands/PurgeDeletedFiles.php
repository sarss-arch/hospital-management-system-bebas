<?php
namespace App\Console\Commands;
use App\Models\File; use Illuminate\Console\Command; use Illuminate\Support\Facades\Storage;
class PurgeDeletedFiles extends Command { protected $signature='files:purge-deleted'; protected $description='Hapus fisik file yang sudah soft deleted'; public function handle(): int { File::onlyTrashed()->where('deleted_at','<=',now()->subDay())->chunk(50,function($files){ foreach($files as $file){ Storage::delete($file->file_path); $file->forceDelete(); } }); return self::SUCCESS; } }
