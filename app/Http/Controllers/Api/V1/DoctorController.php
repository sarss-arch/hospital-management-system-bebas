<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    // LEFT JOIN: dokter beserta jadwalnya, termasuk yang belum punya jadwal
    public function index(): JsonResponse
    {
        $doctors = DB::table('doctors')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->leftJoin('schedules', 'doctors.id', '=', 'schedules.doctor_id')
            ->select(
                'doctors.id',
                'users.name',
                'doctors.specialization',
                'doctors.phone',
                'schedules.day_of_week',
                'schedules.start_time',
                'schedules.end_time'
            )
            ->paginate(10);

        return ApiResponse::success($doctors);
    }
}
