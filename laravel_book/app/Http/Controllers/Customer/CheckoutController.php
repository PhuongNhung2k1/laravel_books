<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth; // doi tuong
use App\Models\Cart;
use App\Models\Products;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{

    public function __construct()
    {
    }
    public function form()
    {
        return view('frontend.homepage.checkout');
    }
}