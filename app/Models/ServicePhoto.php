<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ServicePhoto extends Model
{
    use HasUuids;

    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'service_photos';
    protected $fillable = [
        'id',
        'service_id',
        'path'
    ];
}
