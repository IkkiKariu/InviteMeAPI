<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\PersonalAccessToken;
use App\Models\User;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    protected function hasAdminRights(Request $request): bool
    {
        // Был ли токен передан в заголовке
        $token = $request->bearerToken();
        if(!$token) return false;

        // Действителен ли токен (наличие в БД и срок действия)
        $tokenModel = PersonalAccessToken::where('token', '=', hash('sha256', $token))->where('expires_at', '>', now())->first();
        if(!$tokenModel) return false;

        // Ссылается ли токен на действительного пользователя
        $userModel = User::find($tokenModel->tokenable_id);
        if(!$userModel) return false;

        return $userModel->is_admin;
    }
}
