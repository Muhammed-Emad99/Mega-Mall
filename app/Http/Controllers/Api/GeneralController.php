<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CouponResource;
use App\Models\Coupon;

class GeneralController extends Controller
{

    public function getAllCoupons(){
        try {

            $coupons = Coupon::all();
            if (count($coupons) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get all coupons successfully',
                        'coupons' => CouponResource::collection($coupons),

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
}
