<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section1 extends Model
{
    use HasFactory;

    protected $table = 'section1';

    protected $fillable = [
        'title',
        'svg',
        'description',
        'link',
    ];
}