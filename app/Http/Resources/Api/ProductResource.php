<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $featured = "Not Featured";
            if ($this->featured != 0) {
                $featured = "Featured";
            }


            return [
                "id" => $this->id,
                "title" => $this->title,
                "description" => $this->description,
                "image" => $this->image,
                "price" => $this->price,
                "discountPercentage" => $this->discountPercentage,
                "featured" => $featured,
                "category" => $this->category->title,
            ];
        }
}
