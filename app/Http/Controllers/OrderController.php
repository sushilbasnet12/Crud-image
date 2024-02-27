<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        return view("orders.index", ["order" => Order::get()]);
    }

    public function create()
    {

        return view("orders.create", ["products" => Product::get()]);
    }


    public function edit($id)
    {
        $order = Order::find($id);
        return view("orders.edit", ['order' => $order, "products" => Product::get()]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'product_types' => 'required',
            'product_id' => 'required',
        ]);

        $order = new Order;
        $order->customer_name = $request->name;
        $order->customer_address = $request->address;
        $order->product_types = $request->product_types;
        $order->product_id = $request->product_id;
        $order->save();

        return redirect()->route('order.index')->with('success', 'Order Created !!!');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'types' => 'required',
            'product_id' => 'required',
        ]);

        $order = Order::find($id);
        $order->customer_name = $request->name;
        $order->customer_address = $request->address;
        $order->product_types = $request->types;
        $order->product_id = $request->product_id;
        $order->save();

        return redirect()->route('order.index')->with('success', 'Order updated !!!');
    }



    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back()->with('success', 'Order Deleted !!!');
    }
}
