<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
// use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::select('id', 'user_id', 'ngay_giao', 'noi_giao_hang', 'status', 'tong_tien')->with('user')->orderBy('id', 'desc')->paginate(10);
        
        return view('admin.order.list', ['orders' => $orders]);
    }
    public function getOrder($tt){
        $carts = Cart::select('*')->with('product')->where('user_id', '=', Auth::user()->id)->get();
        return view('client.checkout', ['cart' => $carts, 'tt' => $tt]);
    }
    public function addOrder($tt){
        
        $data = new Order();
        $data->user_id = Auth::user()->id;
        $data->noi_giao_hang = Auth::user()->address;
        $data->status = 0;
        $data->tong_tien = $tt;
        $data->save();
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        // foreach($cart as $cart){
        //     $orderDetail = new OrderDetail();
        //     $orderDetail->product_id = $cart->product_id;
        //     $orderDetail->quantity = $cart->quantity;
        //     $orderDetail->thanh_tien = $cart->tong_tien;
        //     $orderDetail->order_id = $data->id;
        //     $orderDetail->save();      
        //     Cart::destroy($cart->id);     
        // }
        return redirect()->route('orderDetail');
    }
     public function delete(Order $id) {
        if ($id->delete()) {
            return redirect()->back();
        }
    }
    // public function viewOrderDetail() {
    //     $orderDetail = OrderDetail::select('*')->with('product')->get();
    //     // dd($orderDetail);
    //     return view('clients.order-detail', ['orderDetail' => $orderDetail]);
    // }
}