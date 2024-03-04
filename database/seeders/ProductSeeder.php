<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            "iPhone9", "iPhoneX", "SamsungUniverse9", "OPPOF19",
            "Jacket", "Ring", "Potato", "Fog Scent Xpressio Perfume",
            "Non-Alcoholic Concentrated Perfume Oil",
            "Eau De Perfume Spray", "Tree Oil 30ml",
            "Skin Beauty Serum", "Flying Wooden Bird",
            "3D Embellishment Art Lamp",
            "Handcraft Chinese style", "Key Holder",

        ];
        for ($i = 0; $i < count($products); $i++) {
            Product::create([
                'title' => $products[$i],
                'description' => $products[$i].$products[$i],
                'image' => strtolower($products[$i]) . '.jpeg',
                "price" => rand(10, 1000),
                "discountPercentage" => rand(10, 70),
                "category_id" => rand(1, 10),
            ]);
        }
    }
}
