<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'mobile',
        'email',
        'booking_date',
        'booking_time',
        'adults',
        'children',
        'total_price',
    ];
}
