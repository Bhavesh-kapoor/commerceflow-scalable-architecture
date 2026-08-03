<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, AuthService $authservice){
       try{
            return Response::success('register successfully', $authservice->register($request->validated()));
       }catch(\Exception $e){
            return Response::error($e->getMessage(), null, $e->getCode() ?? HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
       }
        
    }
}
