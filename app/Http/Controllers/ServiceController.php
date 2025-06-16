<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Services\ServiceService;
use App\Http\Requests\StoreServiceRequest;

class ServiceController extends Controller
{
    private ServiceService $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function store(StoreServiceRequest $request)
    {
        $this->serviceService->create($request->validated());
    }

    public function show(string $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => ['required', 'uuid', 'exists:services,id']
        ]);

        if ($validator->fails()) return response()->json(status: 404);

        return response()->json(data: $this->serviceService->get($id), status: 200);
    }

    public function index()
    {
        return response()->json(data: $this->serviceService->all(), status: 200);
    }
}
