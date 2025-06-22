<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Services\ServiceService;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ExtServiceResource;

class ServiceController extends Controller
{
    private ServiceService $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function store(StoreServiceRequest $request)
    {
        $resource = new ExtServiceResource($this->serviceService->create($request->validated()));

        return $resource->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return new ExtServiceResource($this->serviceService->get($id));
    }

    public function index()
    {
        return ServiceResource::collection($this->serviceService->all());
    }

    public function update(UpdateServiceRequest $request, string $id)
    {
        return new ExtServiceResource($this->serviceService->update($id, $request->validated()));
    }

    public function delete(string $id)
    {
        $this->serviceService->delete($id);
        
        return response()->json(data: ['data' => []], status: 200);
    }
}
