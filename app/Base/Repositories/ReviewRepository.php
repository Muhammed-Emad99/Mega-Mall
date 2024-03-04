<?php

namespace App\Base\Repositories;

use App\Base\Interfaces\ReviewRepositoryInterface;
use App\Models\Review;


class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    public function __construct(Review $model)
    {
        $this->model = $model;
    }

    public function getProductReviews($productID){
        return $this->model->where('product_id', $productID)->get();
    }


}
