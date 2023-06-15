<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'category')->paginate(5);
        return response()->json([
            'success' => true,
            'results' => $products
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
