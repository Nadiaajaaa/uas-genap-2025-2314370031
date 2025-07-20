<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price',
        'category_id', 'is_publish', 'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
