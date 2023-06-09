<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('dataseeder.products');

        foreach($products as $product){
            $newProduct = new Product();
            $newProduct->name = $product['name'];
            $newProduct->slug = Str::slug($product['name'], '-');
            $newProduct->brand_id = $product['brand_id'];
            $newProduct->price = $product['price'];
            $newProduct->category_id = $product['category_id'];
            $newProduct->texture_id = $product['texture_id'];
            $newProduct->description = $product['description'];
            $newProduct->cover_image = $product['image_link'];
            $newProduct->save();

        }
    }
}
