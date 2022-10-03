<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'title_en',
        'title_vi',
        'desc_en',
        'desc_vi',
        'slug_en',
        'slug_vi',
        'contact_en',
        'contact_vi',
        'box_contact_en',
        'box_contact_vi',
        'latitude',
        'longitude',
    ];
}
