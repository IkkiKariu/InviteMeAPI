<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class VisitingTime extends Model
{
    use HasUuids;
    
    protected $table = 'visiting_times';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'datetime',
        'is_booked'
    ];
}
