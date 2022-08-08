<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function listCart()
    {
        $total = 0;
        $totalall = 0;
        if (Auth::user()) {
            $count_giohang = Cart::where('user_id', Auth::user()->id)->get();
        }
        $giohang = Cart::where('user_id', Auth::user()->id)->get();
        // dd($giohang);
        return view('client.shopping-cart', [
            'giohang' => $giohang,
            'count_giohang' => $count_giohang,
            'total' => $total,
            'totalall' => $totalall
        ]);
    }
    public function addCart(Product $product, Request $request, Cart $cart)
    {

        $user = Auth::user();
        if ($request->quantity > $product->quantity) {
            return redirect()->back();
        }
        if ($product->promotion != null) {
            foreach ($cart->all() as $value) {
                if ($user->id == $value->user_id && $product->id == $value->product_id) {
                    $value->fill([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                        'avatar' => $product->avatar,
                        'quantity' => $value->quantity + $request->quantity,
                        'price' => $product->price,
                        'name' => $product->name,
                    ]);
                    $value->save();
                    return back();
                }
            }
         
            $oneCart = new Cart();
            $oneCart->fill([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'avatar' => $product->avatar,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'name' => $product->name,
            ]);
            $oneCart->save();
            return back();
        } else {
            foreach ($cart->all() as $value) {
                if ($user->id == $value->user_id && $product->id == $value->product_id) {
                    $value->fill([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                        'avatar' => $product->avatar,
                        'quantity' => $value->quantity + $request->quantity,
                        'price' => $product->price,
                        'name' => $product->name,
                    ]);
                    $value->save();
                    return back();
                }
            }
            $request->quantity = $request->quantity;
            $oneCart = new Cart();
            $oneCart->fill([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'avatar' => $product->avatar,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'name' => $product->name,
            ]);
            $oneCart->save();
            return redirect()->back();
        }
    }
    public function delete(Request $request)
    {
        Cart::destroy($request->id);
        return back();
    }
   
}