<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Cart;
class OrderController extends Controller
{
    //

    public function orders()
    {

    }
    public function orderPost(Request $request, $id)
    {
        // dd($this->checkout());
        // $phonecurrent = $request->phoneship;
        // $addresscurrent = $request->addressship;
        // dd($phonecurrent);
        if (Auth::id()) {
            $user = auth()->user();
            $product = Products::find($id);
            $cart = new Cart();

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->name;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            // dd($cart);

            return redirect()->back()->with('message', 'Product added successfully');
        } else {
            return redirect('customer/login');
        }

        // return view("frontend.homepage.order");
    }


    public function orderSuceess()
    {
        return view("frontend.homepage.orderSuccessfull");
    }
    public function orderDetail($id)
    {
        $order = DB::table("carts")->where("id", "=", $id)->get();
        return view("backend.homepage.orderDetailView", ["order" => $order]);
    }
}
