@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">


          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">

                @php
                $online_user = 0;
            @endphp

            @foreach ($users as $item)
            @php
                if ($item->UserIsOnline()){
                    $online_user = $online_user +1;
                }
            @endphp

            @endforeach
                <h3 class="box-title">
                    total Users {{ count($users) }} and Active <span class="badge badge-pill badge-danger">{{ $online_user }}</span>
                </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Account</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $item)

                          <tr>
                              <td><img src="{{ asset($item->image) }}" alt="" height="60px;" width="60px;"></td>
                              <td> {{ $item->name }} </td>
                              <td> {{ $item->phone }} </td>

                              <td>
                                @if ($item->UserIsOnline())
                                <span class="badge badge-pill badge-primary">Active Now</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
                                @endif
                            </td>

                              <td>
                                  @if ($item->isban == 0)
                                  <span class="badge badge-pill badge-primary">Unbanned</span>
                                  @else
                                  <span class="badge badge-pill badge-danger">Banned</span>
                                  @endif
                              </td>

                              <td width="30%">
                                  @if ($item->isban == 0)
                                  <a href="{{ route('user.ban',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-arrow-down"></i>Ban</a>
                                  @else
                                  <a href="{{ route('user.unban',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-arrow-up"></i>Unban</a>
                                  @endif

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
