<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\VisitingTimeService;
use App\Http\Requests\StoreVisitingTimeRequest;

class VisitingTimeController extends Controller
{
    private VisitingTimeService $visitingTimeService;

    public function __construct(VisitingTimeService $visitingTimeService)
    {
        $this->visitingTimeService = $visitingTimeService;
    }

    public function store(StoreVisitingTimeRequest $request)
    {
        $this->visitingTimeService->create($request->validated());

        return response()->json(data: ['data' => []], status: 204);
    }
}
