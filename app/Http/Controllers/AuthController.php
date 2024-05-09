<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Responses\Response;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Spatie\Permission\Traits\HasRoles;



class AuthController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function register(RegisterRequest $request)
    {

        try {
            $data = $request->validated();
            $user = $this->userService->register($data);
            return Response::Success($user['message'], $user['user'], 200);
        } catch (\Throwable $th) {
            return Response::Error($th->getMessage(), [], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();
            $user = $this->userService->login($data);
            return Response::Success($user['message'], $user['user'], $user['code']);
        }
        //code...
        catch (\Throwable $th) {

            return Response::Error($th->getMessage(), [], 500);
        }
    }
    public function logout(Request $request)
    {
        try {
            $user = $request->user();
            $user->tokens()->delete();
            return Response::Success('User logged in successfully', [], 200);
        } catch (\Throwable $th) {
            return Response::Error($th->getMessage(), [], 500);
        }
    }
}
