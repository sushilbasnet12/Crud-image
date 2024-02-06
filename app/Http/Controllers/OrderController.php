<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        return view("orders.index", ["order"=> Order::get()]);
    }

    public function create(){
        return view("orders.create");
    }


    public function edit($id){
        $order = Order::find($id);
        return view("orders.edit", ['order' => $order]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'types' => 'required'
            ]);

            $order = Order::find($id);
            $order->customer_name = $request->name;
            $order->customer_address = $request->address;
            $order->product_types = $request->types;
            $order->save();

            return redirect()->route('order.index')->with('success','Order updated !!!');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'types' => 'required'
            ]);

            $order=new Order;
            $order->customer_name = $request->name;
            $order->customer_address = $request->address;
            $order->product_types = $request->types;
            $order->save();

            return redirect()->route('order.index')->with('success','Order Created !!!');
    }



    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back()->with('success','Order Deleted !!!');
    }
}
