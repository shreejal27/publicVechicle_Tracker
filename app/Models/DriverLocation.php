<?php

namespace App\Models;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'driver_id',
        'latitude',
        'longitude',
        'status',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
