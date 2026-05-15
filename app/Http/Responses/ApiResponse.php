<?php
namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse {
    public static function success(mixed $data=null, string $message='Success', int $code=200, array $meta=[]): JsonResponse {
        return response()->json(['status'=>'success','message'=>$message,'data'=>$data,'meta'=>(object)$meta,'errors'=>null], $code);
    }
    public static function error(string $message='Error', int $code=400, mixed $errors=null): JsonResponse {
        return response()->json(['status'=>'error','message'=>$message,'data'=>null,'meta'=>(object)[],'errors'=>$errors], $code);
    }
}
