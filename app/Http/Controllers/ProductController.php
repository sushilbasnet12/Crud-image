<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        return view("products.index", ["products"=>Product::get()]);
    }

    public function create(){
        return view("products.create");
    }

    public function edit($id){
        $product = Product::where('id', $id)->first();
        return view("products.edit",["product" => $product]);
    }

    public function update( Request $request, $id){
        //Validate Data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
            ]);

            $product = Product::where('id', $id)->first();

            if(isset($request->image)){
                //upload Image
               $imageName = time().'.'.$request->image->extension();
               $request->image->move(public_path('products'), $imageName);
               $product->image = $imageName;

            }
        
        $product->name = $request->name;
        $product->description = $request->description;
        

        $product->save();

        return redirect()->route('product.index')->withSuccess('Product Updated !!!'); //Flash Message
        


    
    }

    public function store(Request $request){

        //Validate Data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
            ]);

        //upload Image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        //spatie medialibrary

        //store image into Database
        $product = new  Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('product.index')->withSuccess('Product Created !!!');  //Flash Message


    }

    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted !!!');
    }


}

