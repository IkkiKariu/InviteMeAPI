<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'service 1',
            'description' => 'description 1',
            'price' => '1000.00',
            'type' => 'basic',
            'archived' => false
        ]);

        Service::create([
            'title' => 'service 2',
            'description' => 'description 2',
            'price' => '2000.00',
            'type' => 'basic',
            'archived' => true
        ]);
    }
}
