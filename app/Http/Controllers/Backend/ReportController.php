<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DateTime;

class ReportController extends Controller
{
    public function ReportView(){
        return view('backend.report.index');
    }
    public function SearchByDate(Request $request){
        $date = new DateTime($request->date);
        $formatdate = $date->format('d F Y');

        $orders = Order::where('order_date',$formatdate)->latest()->get();
        return view('backend.report.reports',compact('orders'));

    }

    //report by month
    public function SearchByMonth(Request $request){
        // dd($request->year_name);

        $orders = Order::where('order_month',$request->month_name)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.reports',compact('orders'));

   }
   //report by year
   public function SearchByYear(Request $request){

    $orders = Order::where('order_year',$request->year)->latest()->get();
    return view('backend.report.reports',compact('orders'));

}
}
