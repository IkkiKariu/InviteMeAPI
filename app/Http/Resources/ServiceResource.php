<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

use App\Http\Resources\BaseResource;
use App\Models\ServicePhoto;

class ServiceResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $servicePhotoModel = ServicePhoto::where('service_id', '=', $this->id)->first();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'type' => $this->type,
            'work_time' => $this->work_time,
            'photo_url' => $servicePhotoModel ? Storage::url($servicePhotoModel->path) : null,
            'archived' => $this->when($this->hasAdminRights($request), $this->archived)
        ];
    }
}
