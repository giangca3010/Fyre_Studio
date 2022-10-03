<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title_en',
        'title_vi',
        'desc_en',
        'desc_vi',
        'slug_en',
        'slug_vi',
        'banner',
        'image_about',
        'about_en',
        'about_vi',
        'content_en',
        'content_vi',
        'box_about_en',
        'box_about_vi',
    ];
}
