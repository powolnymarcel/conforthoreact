<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'subtitle',
        'file_1',
        'file_1_visible',
        'file_2',
        'file_2_visible',
        'external_link',
        'image',
    ];

    protected $casts = [
        'file_1_visible' => 'boolean',
        'file_2_visible' => 'boolean',
    ];
}
