<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'slug',
        'feature_image',
        'content',
        'status', // 1: hien thi; 0:an
        'language',
    ];

    const ACTIVE = 1;
    const INACTIVE = 0;
}
