<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title_en',
        'title_vi',
        'slug_en',
        'slug_vi',
        'desc_en',
        'desc_vi',
        'image',
        'is_featured',
        'position'
    ];

    const ACTIVE = 1;
    const INACTIVE = 0;
}
