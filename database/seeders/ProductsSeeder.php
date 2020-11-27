<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVersion;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product1 = Product::create([
            "product_name" => "Email services",
        ]);

        $product2 = Product::create([
            "product_name" => "Cloud services",
        ]);

        $product3 = Product::create([
            "product_name" => "API Management services",
        ]);

        ProductVersion::create(
            [
                "product_version" => 1,
                "product_id" => $product1->id
            ]
        );


        ProductVersion::create(
            [
                "product_version" => 2,
                "product_id" => $product1->id
            ]
        );
        ProductVersion::create(
            [
                "product_version" => 3,
                "product_id" => $product1->id
            ]
        );
        ProductVersion::create(
            [
                "product_version" => 1,
                "product_id" => $product2->id
            ]
        );

        ProductVersion::create(
            [
                "product_version" => 2,
                "product_id" => $product2->id
            ]
        );
    }
}
