<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        return view("orders.index");
    }

    public function create(){
        return view("orders.create");
    }

    public function store(Request $request){
        //Validate Data
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'types' => 'required'
            ]);


    }
}
