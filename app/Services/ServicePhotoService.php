<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

use App\Models\ServicePhoto;
use Illuminate\Http\UploadedFile;

class ServicePhotoService
{
    public function upload(string $serviceId, UploadedFile $photo): void
    {
        $path = Storage::putFile('service-photos', $photo);
        ServicePhoto::create(['service_id' => $serviceId, 'path' => $path]);
    }

    public function remove(string $serviceId): void
    {
        $servicePhotoModel = ServicePhoto::where('service_id', '=', $serviceId)->first();
        
        if(!$servicePhotoModel) return;
        
        Storage::delete($servicePhotoModel->path);
        $servicePhotoModel->delete();
    }
}