<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'number',
        'type',
        'subject',
        'description',
    ];
}
