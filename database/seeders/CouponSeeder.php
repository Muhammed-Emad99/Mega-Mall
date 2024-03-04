<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = ["Egy","Messi","Barca"];
        $discounts = [5,10,50];
        for ($i = 0; $i < count($coupons) ; $i++) {
            Coupon::create([
                "coupon_title" => $coupons[$i] ,
                "discount" =>$discounts[$i] ,
            ]);
        }
    }
}
