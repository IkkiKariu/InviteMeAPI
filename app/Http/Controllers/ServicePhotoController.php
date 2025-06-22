<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreServicePhotoRequest;
use App\Services\ServicePhotoService;

class ServicePhotoController extends Controller
{
    private ServicePhotoService $servicePhotoService;

    public function __construct(ServicePhotoService $servicePhotoService)
    {
        $this->servicePhotoService = $servicePhotoService;
    }

    public function store(StoreServicePhotoRequest $request, string $serviceId)
    {
        $validated = $request->validated();
        $this->servicePhotoService->upload($serviceId, $validated['photo']);

        return response()->json(data: ['data' => []], status: 201);
    }

    public function delete(string $serviceId)
    {
        $this->servicePhotoService->remove($serviceId);

        return response()->json(data: ['data' => []], status: 200);
    }
}
