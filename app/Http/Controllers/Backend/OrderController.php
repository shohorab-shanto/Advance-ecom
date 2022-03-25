<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function PendingOrder(){
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending',compact('orders'));
    }//pending

    public function ConfirmOrder(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.orders.confirm',compact('orders'));
    }//pending
    public function ProcessingOrder(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing',compact('orders'));
    }//pending
    public function PickedOrder(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked',compact('orders'));
    }//pending
    public function ShippedOrder(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped',compact('orders'));
    }//pending
    public function DeliveredOrder(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered',compact('orders'));
    }//pending
    public function CancelOrder(){
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel',compact('orders'));
    }//pending

    public function ViewOrders($order_id){
        $order = Order::with('division','district','state','user')->where('status','pending')->where('id',$order_id)->orderBy('id','DESC')->first();
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        dd($order);
        return view('backend.orders.view-orders',compact('order','orderItems'));
    }//pending


}
