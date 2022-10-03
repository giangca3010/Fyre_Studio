<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    protected $fillable = [
        'avatar',
        'name',
        'service',
        'position',
    ];
}
