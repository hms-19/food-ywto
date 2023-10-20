<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $userId = auth()->user()->id;

        $orders = Order::where('user_id',$userId)->orderBy('created_at','desc')->paginate(10);

        return view('order-history',compact('orders'));
    }
}
