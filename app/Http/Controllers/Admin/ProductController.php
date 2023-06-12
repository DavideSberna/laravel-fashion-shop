<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::paginate(15);
        return view('admin.products.create' , compact('products', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($data['name'], '-');
        $data['slug'] = $slug;

        //dd($data);
        //dd($slug);
        //dd($data['slug']);

        if ($request->hasFile('cover_image')) {
            $image_path = Storage::put('images', $request->cover_image);
            $data['cover_image'] = asset('storage/' . $image_path);
        };

        //dd($data);
        $product = Product::create($data);






        return redirect()->route('admin.products.show', $product->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function edit(Product $product)
    {
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit' , compact('product', 'products', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     *
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $slug = Str::slug($request->name, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('cover_image')) {
            $image_path = Storage::put('images', $request->cover_image);
            $data['cover_image'] = asset('storage/' . $image_path);
        };

        $product->update($data);
        return redirect()->route('admin.products.show', $product->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name deleted successfully.");
    }
}
