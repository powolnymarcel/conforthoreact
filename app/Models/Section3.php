<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section3 extends Model
{
    use HasFactory;
    protected $table = 'section3';

    protected $fillable = [
        'image',
        'category',
        'title',
        'description',
        'ul_li_list',
        'ul_li_list_2',
        'link',
    ];
}