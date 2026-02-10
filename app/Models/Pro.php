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
        'file_2',
        'external_link',
        'image',
    ];
}
