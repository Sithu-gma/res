<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index () {
        $orders=Order::all();
        return view('kitchen.order',compact($orders));
    }
}
