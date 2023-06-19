<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        if (!empty($request->query('category_id'))) {
            $category_id = $request->query('category_id');
            $products = Product::where('category_id', $category_id)->with('brand', 'category')->paginate(5);
        } else {
            $products = Product::with('brand', 'category')->paginate(5);
        }

        $categories = Category::all();

        return response()->json([
            'success' => true,
            'results' => [
                'products' => $products,
                'categories' => $categories,

            ]
        ]);
    }

    public function show($slug)
    {
        $products = Product::with('brand', 'category')->where('slug', $slug)->first();

        if($products){
            return response()->json([
                'success' => true,
                'results' => $products
            ]);
        }else{
            return response()->json([
                'success' => false,
                'results' => 'record non found'
            ]);
        }
       
    }
}
