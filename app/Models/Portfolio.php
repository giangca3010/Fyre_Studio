<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    protected $fillable = [
        'category_portfolio',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryPortfolio::class, 'category_portfolio');
    }
}
