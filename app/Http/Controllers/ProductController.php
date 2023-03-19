<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $products = $this->service->getList();
        
        //dd($products);

        return view('Product.index', compact('products'), ['request' => $request->all()]);
    }

    public function store(StoreProductRequest $storeProductRequest)
    {
        $this->service->addProduct($storeProductRequest);

        return redirect()->route('products.index')->with('success', 'Produto criado!');

    }


    public function create()
    {
        return view('Product.create');
    }

    public function show(Product $product)
    {
        $this->service->getProduct($product);

        //dd($product);

        return view('Product.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        $this->service->editProduct($product);

        return view('Product.edit', ['product' => $product]);
    }

    public function update(StoreProductRequest $storeProductRequest, $id)
    {
        /*
        return $this->service->update([
            'name' => $storeProductRequest->name,
            'description' => $storeProductRequest->description,
            'image' => $storeProductRequest->image,
        ], $id);
        */
    }

    public function destroy(Product $product)
    {
        $this->service->destroyProduct($product);

        return redirect()->route('products.index')->with('success', 'Produto excluido!');
        /*
        return $this->service->destroy($id);
        */
    }

    /*
    
    protected $productService;

    public function __construct(ProductService $productService)
    {

        $this->productService = $productService;
    }

    
    public function index()
    {
        $products = $this->productService->getAllProducts();
        //$products = Product::with('images')->get();
        //dd($products);
        return view('Product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('Product.create');
    }

    public function store(StoreProductRequest $storeProductRequest)
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

        /*
        $this->productService->addProduct(
            $storeProductRequest->validated('name'),
            $storeProductRequest->validated('description'),
            $storeProductRequest->validated('photos'),
        );        

        return redirect()->route('products.index')->with('success', 'Produto criado!');
    }
    
    */
    /*
    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update( Product $product)
    {
        //
    }

 
    public function destroy(Product $product)
    {
        //
    }
    */
}
