<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\PersonalAccessToken;

class TokenAuthService {
    public function issueToken(array $credentials): ?string
    {
        // Опознание пользователя по учетным данным
        $user = User::where('login', '=', $credentials['login'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) return null;
        
        // Выдача токена
        $token = $user->createToken(name: 'auth', abilities: ['*'], expiresAt: now()->addDays(3))->plainTextToken;

        // Возврат токена без его ID
        return explode('|', $token)[1];
    }

    public function revokeToken(string $token): void
    {
        PersonalAccessToken::where('token', hash('sha256', $token))->first()->delete();
    }
}
