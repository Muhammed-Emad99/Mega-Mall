<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order id' => $this->id,
            "status" => $this->status,
            "type" => $this->type,
            "total price after discount" => $this->total_after_discount,
            "username" => $this->user->name,
            "products" => $this->items->map(function($item) {
                $product = $item->product;
                return new ProductResource($product);
            }),
        ];
    }
}
