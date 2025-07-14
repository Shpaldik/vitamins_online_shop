<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'images',
        'instruction_file',
        'category',
        'series',
        'age_group',
        'tablet_count',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
