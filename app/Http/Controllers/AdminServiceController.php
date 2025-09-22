<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ServiceResource;
use App\Services\ServiceService;
use Illuminate\Support\Facades\Validator;

class AdminServiceController extends ServiceController
{
    public function __construct(ServiceService $serviceService)
    {
        parent::__construct($serviceService);
    }

    public function index(Request $request)
    {
        $validator = Validator::make(['archived' => $request->query('archived')], [
            'archived' => ['boolean', 'nullable']
        ]);

        if ($validator->fails()) { return response()->json(status: 404); }

        return ServiceResource::collection($this->serviceService->all($validator->validated()['archived']));
    }
}
