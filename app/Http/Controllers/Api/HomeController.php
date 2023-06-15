<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('price', 'desc')->take(5)->get();
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'results' => [
                'products' => $products,
                'categories' => $categories,
            ]
        ]); 
    }
    
}
