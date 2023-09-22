<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'contact_number',
        'username',
        'password',
        'profileImage',
    ];

    //to disable the timestamps on the database table
    public $timestamps = false;
}
