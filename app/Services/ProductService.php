<?php

namespace App\Services;
use App\Http\Requests\StoreProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductService
{
    public function getList()
    {
        return Product::with(['images'])->paginate(5);
    }

    public function addProduct(array $data){

        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],

        ]);

        foreach ($data['photos'] as $photo) {
            $fileName = now().'-'.$photo->getClientOriginalName();
            $product->images()->create([
                'url' => $photo->storeAs('images', $fileName),
                'product_id' => $product->id
            ]);
        }
    }

    public function getProduct($id)
    {
        return Product::with(['images']);
    }

    public function editProduct(Product $product)
    {
        
        return Product::with(['images']);
    }

    public function updateProduct(StoreProductRequest $storeProductRequest, $id)
    {
        
    }

    public function destroyProduct(Product $product)
    {
        $product->delete();
    }

    /*
    private $repo;

    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store(array $data)
    {
        
        return $this->repo->store($data);
    }

    public function getList()
    {
        return $this->repo->getList();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update(array $data, $id)
    {
        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }

    /*
    public function getAllProducts(){

        return Product::get();

    }
    */

    
    

}
