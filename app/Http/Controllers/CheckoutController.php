<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function checkout(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'township' => 'required|string',
            'number' => 'required|string',
            'payment' => 'required|string',
        ]);

        $cartCollection = \Cart::getContent();

        $product_ids = [];
        $quantities = [];


        foreach ($cartCollection as $item) {
            $product_ids[] = (int)$item->get('id');
        }

        foreach ($cartCollection as $item) {
            $quantities[] = ['quantity' => (int)$item->get('quantity')];
        }

        // dd($quantities);

        $order = new Order([
            "user_id" => auth()->user()->id,
            "status" => "pending",
            'ward' => $request->ward,
            'street' => $request->street,
            'number' => $request->number,
            'township' => $request->township,
            'payment' => $request->payment,
            'payment_type' => $request->payment_type
        ]);

        $order->save();

        // dd(array_combine($product_ids,$quantities));

        $order->menus()->attach(array_combine($product_ids,$quantities));
               
        \Cart::clear();

        return redirect('/process')->with('success' , 'Order Foods successfully');
    }
}
