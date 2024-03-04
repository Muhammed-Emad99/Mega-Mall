<?php

namespace App\Base\Interfaces;

interface ProductRepositoryInterface
{
    public function getFeaturedProducts();
    public function getProductsByCategoryId($category_id);

}
