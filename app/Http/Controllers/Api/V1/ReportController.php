<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller; use App\Services\ReportService; use Symfony\Component\HttpFoundation\StreamedResponse;
class ReportController extends Controller { public function export(ReportService $service): StreamedResponse { $rows=$service->medicalRecordReport(); return response()->streamDownload(function() use($rows){ $out=fopen('php://output','w'); fputcsv($out,['Tanggal','Pasien','Dokter','Spesialisasi','Diagnosis','Resep']); foreach($rows as $r) fputcsv($out,(array)$r); fclose($out); }, 'medical-record-report.csv', ['Content-Type'=>'text/csv']); } }
