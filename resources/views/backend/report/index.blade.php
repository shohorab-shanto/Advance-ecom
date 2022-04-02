@extends('admin.admin_master')
@section('admin')


    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <!-- /.col -->

{{-- --------------- add brand page ------------- --}}


                <div class="col-4">

                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Date</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">

                            <form method="post" action="{{ route('search-by-date') }}">

                                @csrf


                                            <div class="form-group">
                                                <h5>Select Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="date" class="form-control" >

                                                    @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                </div>
                                            </div>

                                   <div class="text-xs-right">
                                       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                   </div>
                               </form>


                        </div>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

                <div class="col-4">

                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Month</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">

                            <form method="post" action="{{ route('search-by-month') }}" >

                                @csrf


                                            <div class="form-group">
                                                <h5>Select Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select class="form-control select2" name="month_name" data-placeholder="Choose one" data-validation="required">
                                                        <option label="Choose one"></option>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                      </select>

                                                    @error('month_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label">Select Year: <span class="tx-danger">*</span></label>
                                                    <select class="form-control select2" name="year_name" data-placeholder="Choose one" data-validation="required">
                                                        <option label="Choose one"></option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                      </select>
                                                    @error('year_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                  </div>

                                            </div>

                                   <div class="text-xs-right">
                                       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                   </div>
                               </form>


                        </div>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

                <div class="col-4">

                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search By Date</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">

                            <form method="post" action="{{ route('search-by-year') }}">

                                @csrf


                                            <div class="form-group">
                                                <h5>Select Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select class="form-control select2" name="year" data-placeholder="Choose one" data-validation="required">
                                                        <option label="Choose one"></option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                    </select>

                                                    @error('year')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                </div>
                                            </div>

                                   <div class="text-xs-right">
                                       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                   </div>
                               </form>


                        </div>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>




@endsection
