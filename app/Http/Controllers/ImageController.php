<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $images = Image::with(['product'])->paginate(5);

        //dd($images);

        //return view('ImageProduct.index', ['images' => $images]);
        //return view('ImageProduct.index', compact('images'));
        return view('ImageProduct.index', compact('images'), ['request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image, $id)
    {
        //dd($image);
        $image = Image::find($id);
        $image->delete();

        return redirect()->route('product-images.index')->with('success', 'Imagem deletada!');
    }
}
