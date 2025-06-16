<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasUuids;

    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'services';
    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'type',
        'work_time',
        'archived'
    ];
}
