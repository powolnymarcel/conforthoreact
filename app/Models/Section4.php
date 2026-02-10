<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section4 extends Model
{
    use HasFactory;
    protected $table = 'section4';

    protected $fillable = [
        'text',
        'note',
        'category',
        'image',
        'title',
    ];
}