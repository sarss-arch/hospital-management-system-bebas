<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller; use App\Http\Resources\DoctorResource; use App\Http\Responses\ApiResponse; use App\Models\Doctor;
class DoctorController extends Controller { public function index(){ $d=Doctor::with(['user','schedules'])->paginate(10); return ApiResponse::success(DoctorResource::collection($d)->response()->getData(true)['data'],'Data dokter',200,['pagination'=>['current_page'=>$d->currentPage(),'per_page'=>$d->perPage(),'total'=>$d->total(),'last_page'=>$d->lastPage(),'next_page_url'=>$d->nextPageUrl(),'prev_page_url'=>$d->previousPageUrl()]]); } }
