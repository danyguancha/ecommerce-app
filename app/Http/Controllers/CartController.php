<?php

namespace App\Http\Controllers;
use App\Mail\sendBill;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Cart;


class CartController extends Controller
{
    public function cart()  {
        $cartCollection = Cart::getContent();
        return view('carts.cart')->with(['cartCollection' => $cartCollection]);
    }

    public function remove(Request $request){
        Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request){

        Cart::add(array(
            'id' => $request->id_product,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'slug' => $request->slug
            )
        ));
        //$product = Product::find($request->id_product);
        //Mail::to('dany.1701627413@ucaldas.edu.co')->send(new sendBill($product));
        return redirect()->route('cart.index');
    }

    public function update(Request $request){
        Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }
}
