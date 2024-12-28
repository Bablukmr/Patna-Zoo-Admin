<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'single_image',
        'multiple_images',
        'short_description',
        'long_description',
    ];

    protected $casts = [
        'multiple_images' => 'array',
    ];
}
