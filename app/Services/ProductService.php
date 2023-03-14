<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService{

    public function getAllProducts(){

        return Product::get();

    }

    public function addProduct(Request $request){

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        
        if ($request->hasFile('photos')) {

            $allowedfileExtension=['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('photos');

            foreach ($files as $file) {

                $fileName = now().'-'.$file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {

                    $url = $file->storeAs('images', $fileName);
                    return Image::create([
                        'url' => $url,
                        'product_id' => $product->id,
                    ]);

                }
            }
        }
    }

}
