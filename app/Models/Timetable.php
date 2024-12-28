<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default (optional)
    protected $table = 'timetables';

    // Specify which columns are mass assignable
    protected $fillable = [
        'heading',
        'opening_time',
        'closing_time',
        'description',
    ];
}
