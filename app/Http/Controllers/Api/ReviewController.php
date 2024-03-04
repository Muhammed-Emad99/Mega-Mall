<?php

namespace App\Http\Controllers\Api;

use App\Base\Interfaces\ReviewRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReviewRequest;
use App\Http\Resources\Api\ReviewResource;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    private $model;

    public function __construct(ReviewRepositoryInterface $model){
        $this->model = $model;
    }

    public function makeReview(ReviewRequest $request){
        try {
            $review = $this->model->create([
                "product_id" => $request->product_id,
                "user_id" => Auth::user()->id,
                "rating" => $request->rating,
                "comment" => $request->comment
            ]);

            return response()->json(
                [
                    "status" => true,
                    "message" => 'You make review successfully',
                    'review' => new ReviewResource($review),
                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

    public function getProductReviews($productID){
        try {
            $reviews = $this->model->getProductReviews($productID);
            if (count($reviews) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get all Reviews for this product successfully',
                        'reviews' => ReviewResource::collection($reviews),

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no reviews for this product yet',

                ], 200);
        }catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }
}
