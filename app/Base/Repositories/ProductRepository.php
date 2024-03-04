<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\ProductRepositoryInterface;
use App\Models\Product;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getFeaturedProducts()
    {
        return $this->model->where("featured", 1)->get();
    }

    public function getProductsByCategoryId($category_id)
    {
        return $this->model->where("category_id", $category_id)->get();
    }

}
