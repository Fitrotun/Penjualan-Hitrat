<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $validated = $request->validate([
            'id_user' => ['required'],
            'id_product' => ['required'],
            'quantity' => ['required'],
        ]);

        $cart = Cart::firstOrCreate(['id_user' => $validated['id_user']]);

        $cartItem = CartItem::create([
            'id_cart' => $cart->id,
            'id_product' => $validated['id_product'],
            'quantity' => $validated['quantity']
        ]);

        return redirect(route('cart.show', $cart->id));
    }


    public function show() {
        if(session('id') != null){
            $cart = Cart::where(['id_user' => session('id')])->first();
            if($cart == null) {
                return view('frontend.pages.cart');
            }
            else {
                $items = CartItem::where(['id_cart' => $cart->id])->get();
                $data =[
                    'items' => $items,
                ];
                return view('frontend.pages.cart', $data);
            }
        }
        else {
            return redirect("/");
        }
    }

    public function destroyItem($id) {
        $item = CartItem::destroy($id);
        return redirect(route('cart.show'));
    }
}
