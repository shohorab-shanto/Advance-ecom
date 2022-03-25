@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">


          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Shipped Orders</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Invoice</th>
                              <th>Order Date</th>
                              <th>Amount</th>
                              <th>TNX Id</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($orders as $item)

                          <tr>
                              <td> {{ $item->invoice_no }} </td>
                              <td> {{ $item->order_date }} </td>
                              <td> {{ $item->amount }} </td>
                              <td> {{ $item->transaction_id }} </td>
                              <td> {{ $item->status }} </td>

                              <td width="30%">
                                  <a href="{{ route('view.orders',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a> <!--id dhorlam-->
                                  {{-- <a href="{{ route('confirm.orders.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a> <!--sweet alret er vitorer delete id just eikhne use korci for alert message--> --}}
                              </td>>
                          </tr>

                          @endforeach
                      </tbody>

                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <!-- /.col -->


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>




@endsection
