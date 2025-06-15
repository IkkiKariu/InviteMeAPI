<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AuthRequest;
use App\Services\TokenAuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(TokenAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function auth(AuthRequest $request)
    {
        $token = $this->authService->issueToken($request->validated());

        return $token ? response()->json(data: ['token' => $token], status: 200) : response()->json(status: 401);
    }

    public function logout(Request $request)
    {
        $this->authService->revokeToken($request->bearerToken());

        return response()->json(status: 200);
    }
}
