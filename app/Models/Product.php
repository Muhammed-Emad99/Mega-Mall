<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "image",
        "price",
        "quantity",
        "discountPercentage",
        "featured",
        "category_id",
        'slug'
    ];

    protected $casts = [
        'price' => 'float'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'category_id', 'product_id');
    }
    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
