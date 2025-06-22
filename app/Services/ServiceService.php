<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceService
{
    public function create(array $serviceData): Service
    {
        $service = Service::create($serviceData);

        return $service;
    }

    public function get(string $id): Service
    {
        return Service::find($id);
    }

    public function all(): Collection
    {
        return Service::select('id', 'title', 'price', 'type', 'work_time', 'archived')->get();
    }

    public function update(string $id, array $updServiceData): Service
    {
        $service = Service::find($id);
        $service->title = key_exists('title', $updServiceData) ? $updServiceData['title'] : $service->title;
        $service->description = key_exists('description', $updServiceData) ? $updServiceData['description'] : $service->description;
        $service->price = key_exists('price', $updServiceData) ? $updServiceData['price'] : $service->price;
        $service->type = key_exists('type', $updServiceData) ? $updServiceData['type'] : $service->type;
        $service->work_time = key_exists('work_time', $updServiceData) ? $updServiceData['work_time'] : $service->work_time;
        $service->archived = key_exists('archived', $updServiceData) ? $updServiceData['archived'] : $service->archived;
        $service->save();

        return $service;
    }

    public function delete(string $id): void
    {
        Service::find($id)->delete();
    }
}
