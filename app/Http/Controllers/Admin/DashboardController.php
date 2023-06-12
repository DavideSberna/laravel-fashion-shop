<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Texture;


class DashboardController extends Controller
{
    public function index()
    {   
        $products = Product::with("category", "brand", "texture")->paginate(5);
        $brands = Brand::paginate(5);
        $categories = Category::paginate(5);
        $textures = Texture::paginate(5);

        return view('admin.dashboard', compact('products', 'brands', 'categories', 'textures'));
    }
    
}
