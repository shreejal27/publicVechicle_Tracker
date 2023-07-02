<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleRoute extends Model
{
    use HasFactory;

    protected $table = 'vehicle_routes';

    protected $fillable = [
        'vehicle_name',
        'vehicle_routes',
    ];
}
