<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view("products.index", ["products" => Product::get()]);
    }

    public function create()
    {
        return view("products.create");
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view("products.edit", ["product" => $product]);
    }
    public function store(Request $request)
    {
        //Validate Data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $product = new  Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        // Handling Image with Spatie MediaLibrary
        $product->addMediaFromRequest('image')->toMediaCollection('products');


        return redirect()->route('product.index')->with('success', 'Product Created !!!');  //Flash Message
    }
    public function update(Request $request, $id)
    {
        //Validate Data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $product = Product::where('id', $id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        if ($request->hasFile('image')) {
            // First, clear old images if necessary
            $product->clearMediaCollection('products');
            // Then add new one
            $product->addMediaFromRequest('image')->toMediaCollection('products');
        }

        return redirect()->route('product.index')->with('success', 'Product Updated !!!'); //Flash Message        
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        // Delete associated media files
        $product->getMedia('products')->each(function ($media) {
            $media->delete();
        });

        // Delete the product
        $product->delete();
        return back()->with('success', 'Product Deleted !!!');
    }
}
