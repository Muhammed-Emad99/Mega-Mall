<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $guarded = [];

    public function order() :BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
}
