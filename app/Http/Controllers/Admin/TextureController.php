<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Texture;
use App\Http\Requests\StoreTextureRequest;
use App\Http\Requests\UpdateTextureRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TextureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textures = Texture::all();
        return view('admin.textures.index', compact('textures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTextureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTextureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function show(Texture $texture)
    {
        return view('admin.textures.show' ,compact('texture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function edit(Texture $texture)
    {
        return view("admin.textures.edit", compact("texture"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTextureRequest  $request
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTextureRequest $request, Texture $texture)
    {
        $validated = $request->validated();
        $texture->update($validated);

        $texture->slug = Str::slug($texture->name, "-");
        $texture->save();

        return redirect()->route("admin.textures.show", $texture->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Texture $texture)
    {
        $texture->delete();
        return redirect()->route("admin.textures.index");
    }
}
