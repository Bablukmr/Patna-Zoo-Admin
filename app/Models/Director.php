<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    // use HasFactory;
    protected $table = 'director_page'; // Correct table name
    protected $fillable = ['name', 'image', 'short_desc', 'description', 'status'];
}
