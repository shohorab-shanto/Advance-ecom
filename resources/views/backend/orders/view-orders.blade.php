@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item active text-center">Shipping Information</li>
                    <li class="list-group-item">
                        <strong>Name:</strong> {{ $order->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Phone:</strong>
                        {{ $order->phone }}
                    </li>
                    <li class="list-group-item">
                        <strong>Email:</strong>
                        {{ $order->email }}
                    </li>
                    <li class="list-group-item">
                        <strong>Division:</strong>
                        {{ $order->division->division_name }}
                    </li>
                    <li class="list-group-item">
                        <strong>District:</strong>
                        {{ $order->district->district_name }}
                    </li>
                    <li class="list-group-item">
                        <strong>State:</strong>
                        {{ $order->state->state_name }}
                    </li>

                        <li class="list-group-item">
                            <strong>Post Code:</strong>
                            {{ $order->post_code }}
                        </li>
                    <li class="list-group-item">
                        <strong>Order Date:</strong>
                        {{ $order->order_date }}
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item active text-center">Order Information</li>
                    <li class="list-group-item">
                        <strong>Name:</strong> {{ $order->user->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Phone:</strong>
                        {{ $order->user->phone }}
                    </li>
                    <li class="list-group-item">
                        <strong>Payment By:</strong>
                        {{ $order->payment_method }}
                    </li>
                    <li class="list-group-item">
                        <strong>TNX Id:</strong>
                        {{ $order->transaction_id }}
                    </li>

                        <li class="list-group-item">
                            <strong>Invoice No:</strong>
                            {{ $order->invoice_no }}
                        </li>
                    <li class="list-group-item">
                        <strong>Order Total:</strong>
                        {{ $order->amount }}Tk
                    </li>

                    <li class="list-group-item">
                        <strong>Order Status:</strong>
                        <span class="badge badge-pill badge-primary">{{ $order->status }}</span>
                    </li>

                    <li class="list-group-item">
                        @if ($order->status == 'pending')
                        <a href="{{ url('order/pending-to-confirm/'.$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                        <a href="{{ url('order/pending-to-cancel/'.$order->id) }}" class="btn btn-block btn-danger" id="cancel">Cancel Order</a>
                        @elseif($order->status == 'confirm')
                        <a href="{{ url('order/confirm-to-processing/'.$order->id) }}" class="btn btn-block btn-success" id="processing">Processing</a>
                        @elseif($order->status == 'processing')
                        <a href="{{ url('order/processing-to-picked/'.$order->id) }}" class="btn btn-block btn-success" id="picked">Picked</a>
                        @elseif($order->status == 'picked')
                        <a href="{{ url('order/picked-to-shipped/'.$order->id) }}" class="btn btn-block btn-success" id="shipped">Shipped</a>
                        @elseif($order->status == 'shipped')
                        <a href="{{ url('order/shipped-to-delivery/'.$order->id) }}" class="btn btn-block btn-success" id="delivered">Delevery</a>

                        @endif
                    </li>

                </ul>
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>




@endsection
