<?php

namespace App\Http\Controllers\Api;

use App\Base\Interfaces\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\Category;

class ProductController extends Controller
{
    private $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function getAllProducts()
    {

        try {

            $products = $this->product->getAll();
            if (count($products) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get all products successfully',
                        'products' => ProductResource::collection($products),

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no products yet',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }

    public function getFeaturedProducts()
    {

        try {

            $products = $this->product->getFeaturedProducts();
            if (count($products) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get all featured products successfully',
                        'products' => ProductResource::collection($products),

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no featured products yet',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }

    public function getProductsByCategoryId($categoryId)
    {

        try {
            $category = Category::find($categoryId);
            if ($category == null || $categoryId == null) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'This category not found',
                    ], 200);
            }

            $products = $this->product->getProductsByCategoryId($categoryId);
            if (count($products) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get all category products successfully',
                        'products' => ProductResource::collection($products),

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no featured products yet',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }

    public function getProductById($productId)
    {

        try {
            $product = $this->product->getById($productId);
            if ($product == null || $productId == null) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'This Product not found',
                    ], 200);
            } else {

                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get this product successfully',
                        'product' => new ProductResource($product),

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
