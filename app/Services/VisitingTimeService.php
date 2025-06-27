<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\VisitingTime;

class VisitingTimeService
{
    public function create(array $visitingTimeData)
    {
        VisitingTime::create($visitingTimeData);
    }
}