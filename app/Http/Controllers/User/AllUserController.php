<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\OrderMail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use PDF;


class AllUserController extends Controller
{
    public function MyOrders(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get(); //login kora user er id er sathe order table er user id match kore oi er joto data ordr table e aca sob niea asbe
        return view('frontend.user.order.order_view',compact('orders'));
    }//end method

    public function OrdersDetails($order_id){
        $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first(); //to get specific row data use first and order id and user id willmatch with our order table id
        $orderItems = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderItems'));
     }

     //invoice download
     public function InvoiceDownload($order_id){
        $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first(); //to get specific row data use first and order id and user id willmatch with our order table id
        $orderItems = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('frontend.user.order.invoice',compact('order','orderItems'));
        return $pdf->download('invoice.pdf');

     }
     //// return orders submit
     public function ReturnOrderSubmit(Request $request){
        $id = $request->id;
        Order::findOrFail($id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);
        $notification=array(
            'message'=>'Return Request Send Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('my.orders')->with($notification);

     }
     // return order list
     public function ReturnOrders(){
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return-order',compact('orders'));
     }
     // cancel order
     //cancel order show
    public function CancelOrders(){
        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel-order',compact('orders'));
    }
}
