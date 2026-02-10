<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Specialiste extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'slug',
        'name',
        'firstname',
        'picture',
        'job',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->slug = Str::slug($model->name . ' ' . $model->firstname);
        });
    }
}