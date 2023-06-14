<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'license_number',
        'contact_number',
        'vehicle_number',
        'username',
        'password',
    ];
    public $timestamps = false;
    // Define any relationships or additional methods as needed
}
