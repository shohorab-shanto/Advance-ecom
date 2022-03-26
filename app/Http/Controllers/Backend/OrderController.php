<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use PDF;


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
        $order = Order::with('division','district','state','user')->where('id',$order_id)->orderBy('id','DESC')->first();
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // dd($order);
        return view('backend.orders.view-orders',compact('order','orderItems'));
    }//pending

    //pending to confirm
    public function pendingToConfirm($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'confirm',
            'confirmed_date' => Carbon::now()
            ]);
        $notification=array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('pending')->with($notification);
    }

    //cancel order
    public function pendingToCancel($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'cancel',
            'cancel_date' => Carbon::now()
            ]);
        $notification=array(
            'message'=>'Order Cancel Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('pending')->with($notification);
    }

    //confirm to process
    public function confirmToProcess($order_id){
        Order::findOrFail($order_id)->update(['status' => 'processing', 'processing_date' => Carbon::now()]);
            $notification=array(
            'message'=>'Order Processing Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('confirmed')->with($notification);
    }

     //  process to Picked
     public function processToPicked($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'picked',
            'picked_date' => Carbon::now()
        ]);
            $notification=array(
            'message'=>'Order Picked Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('processing')->with($notification);
    }



     //  process to Picked
     public function pickedToShipped($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'shipped',
            'shipped_date' => Carbon::now()
            ]);
            $notification=array(
            'message'=>'Order Shipped Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('picked')->with($notification);
    }

     //  process to Picked
     public function shippedToDelivery($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'delivered',
            'delivered_date' => Carbon::now()
        ]);
            $notification=array(
            'message'=>'Order Delivery Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('picked')->with($notification);
    }

     //invoice download
     public function downloadInvoice($order_id){
        $order = Order::where('id',$order_id)->first(); //to get specific row data use first and order id and user id willmatch with our order table id
        $orderItems = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('backend.orders.invoice',compact('order','orderItems'));
        return $pdf->download('invoice.pdf');

    }


}
