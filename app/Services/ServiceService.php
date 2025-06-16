<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{
    public function create(array $serviceData): void
    {
        Service::create($serviceData);
    }

    public function get(string $id): array
    {
        return Service::find($id);
    }

    public function all(): array
    {
        return Service::select('id', 'title', 'price', 'type', 'work_time', 'archived')->get();
    }

}
