<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    // hien thi gio hang
    public function viewCart(Cart $cart){
        return view("frontend.homepage.cart",['cart'=>$cart]);
    }
    public function add(Cart $cart,$id){
        $product = Products::find($id);
        $cart->add($product);
        // dd(session('cart'));
        return redirect()->back()->with('success','Sản phẩm đã được thêm vào giỏ ');// quay lai trang vua roi
    }

    public function remove(Cart $cart, $id){
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(Cart $cart , $id,$quantity){
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id,$quantity);
        return redirect()->back();
    }
    public function clear(Cart $cart){
        $cart->clear();
        return redirect()->back()->with('success','Giỏ hàng trống');
    }
    public function cart(){
        return view("frontend.homepage.cart");
    }

    public function orders()
    {

    }
    public function orderPost(Cart $cartadd,Products $products,Request $request)
    {
        // dd($this->checkout());
        // $phonecurrent = $request->phoneship;
        // $addresscurrent = $request->addressship;
        // dd($phonecurrent);
        if (Auth::id()) {
            $user = auth()->user();
          
            $cart = new Cart();
            $cart->name = $user->name;  
            if($request->phoneship) {
                $cart->phone = $request->phoneship;
            }else{
                $cart->phone = $user->phone;
            }
            if($request->addressship) {
                $cart->address = $request->addressship;
            }else{
                $cart->address = $user->address;
            }
           
            // $cart->product_title = $cartadd->items;
            $cart->price = $cartadd->total_price;
            // $cart->product_title = 
            $cart->quantity = $cartadd->total_quantity;
            $cartadd->items = Session('cart') ? Session('cart') : "";
            if(Session('cart')==null){
                return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống, Hãy chọn mua và thanh toán nhé!');
            }else{
                
                $cart->save();
                $productInfo = $cartadd->items;
                $cart->clear();
                // dd($cart->quantity);

                return redirect()->back()->with('success', 'Product added successfully');
            }
        } else {
            return redirect('customer/login');
        }
       
        // return view("frontend.homepage.order");
    }
}
