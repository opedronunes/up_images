<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {

        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        //$products = Product::with('images')->get();
        //dd($products);
        return view('Product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        /*
        $regras = [
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:800',
            'photos'      => 'required|min:2'
        ];
        $feedback = [
            'name.required' => ':attribute é obrigatório',
            'photos' => 'A imagem é obrigatória',
            'photos' => 'No mínimo duas fotos'
        ];
        */
        //$request->validated($regras, $feedback);

        $this->productService->addProduct(
            $request->validated('name'),
            $request->validated('description'),
            $request->validated('photos'),
        );        

        return redirect()->route('products.index')->with('success', 'Produto criado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
