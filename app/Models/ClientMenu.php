<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMenu extends Model
{
    protected $fillable = [
        'name_en',
        'name_vi',
        'slug_en',
        'slug_vi',
        'is_active',
        'icon',
        'parent_id',
        'position',
    ];
    public function menuChilderen()
    {
        return $this->hasMany(ClientMenu::class, 'parent_id');
    }
}
