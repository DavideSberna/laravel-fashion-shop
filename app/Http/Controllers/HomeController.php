<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Texture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $queryId = '';
        $selectedCategory = $request->query('category_id');
        $selectedBrand = $request->query('brand_id');

        if ($selectedCategory) {
            $queryId = $selectedCategory;
        } elseif ($selectedBrand) {
            $queryId = $selectedBrand;
        }

        //dd($queryId);

        $productsQuery = Product::query();

        if ($queryId) {
            $productsQuery->whereHas('category', function ($query) use ($queryId) {
                $query->where('id', $queryId);
            });
        }

        $products = $productsQuery->get();
        $categories = Category::all();
        $brands = Brand::all();
        $textures = Texture::all();

        return view('home', compact('products', 'categories', 'brands', 'textures'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
        //dd($relatedProducts);
        return view('show', compact('product', 'relatedProducts'));
    }
}
