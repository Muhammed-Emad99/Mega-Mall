<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ["type", "status", "total_price","user_id","discount"];

    public function getTotalAfterDiscountAttribute()
    {
            $total = $this->total_price - ($this->total_price * ($this->discount / 100));

            return (string) $total;
//        return number_format($total, 2, '.', '');
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items() :HasMany{
        return $this->hasMany(Item::class);
    }
}
