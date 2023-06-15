<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $table = 'stops';

    protected $fillable = [
        'info',
        'latitude',
        'longitude',
        'vehicle_type',
    ];
}