<?php

namespace App\Http\Controllers\Api;

use App\Base\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;

class CategoryController extends Controller
{
    private $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category= $category;
    }

    public function getAllCategories(){
        try {

            $categories = $this->category->getAll();
            if (count($categories) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get all categories successfully',
                        'categories' => CategoryResource::collection($categories),

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no categories yet',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

    public function getCategoryById($categoryID){

        try {
            $category = $this->category->getById($categoryID);
            if ($category == null || $categoryID == null) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'This category not found',
                    ], 200);
            } else {

                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get this category successfully',
                        'category' => new CategoryResource($category),

                    ], 200);
            }

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }

}
