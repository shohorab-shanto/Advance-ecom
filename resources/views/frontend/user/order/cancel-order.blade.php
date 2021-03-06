@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">

            @include('frontend.common.user_sidebar')

            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background: #888888">
                                <td class="col-md-1">
                                    <label for=""> Date</label>
                                </td>
                                <td class="col-md-3">
                                    <label for=""> Total</label>
                                </td>
                                <td class="col-md-3">
                                    <label for=""> Payment</label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""> Invoice</label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""> Order</label>
                                </td>
                                <td class="col-md-1">
                                    <label for=""> Action</label>
                                </td>

                            </tr>

                            @forelse ($orders as $order )

                            <tr>
                                <td class="col-md-1">
                                    <label for=""> {{ $order->order_date }}</label>
                                </td>
                                <td class="col-md-3">
                                    <label for=""> {{ $order->amount }}</label>
                                </td>
                                <td class="col-md-3">
                                    <label for=""> {{ $order->payment_method }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""> {{ $order->invoice_no }}</label>
                                </td>
                                <td class="col-md-2">
                                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }}</span>
                                    <label for=""> </label>
                                </td>
                                <td class="col-md-1">
                                    <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>
                                    <a href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-download"></i>Invoice</a>
                                </td>

                            </tr>
                            @empty
                            <span class="text-danger">Order Not Found</span>
                            @endforelse

                        </tbody>
                    </table>

                </div>

            </div><!-- end col md 8 -->

        </div> <!-- end row -->
    </div>
</div>

@endsection
