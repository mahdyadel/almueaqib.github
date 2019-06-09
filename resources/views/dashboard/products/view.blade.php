@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>سند الإستلام</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            </ol>
        </section>

        <section class="content">

            <div class="">

                <div class="box-header with-border">


                    <div class="wrapper">
                        <!-- Main content -->
                        <section class="invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <center><img class="pull-right" src="{{ asset('uploads/logo/logo.png') }}" style ="width: 250px; height: 120px;" alt="logo"></center>

                                    <h2 class="page-header">
                                        <p class="lead">مجموعة أحمد باشماخ لإدارة الأعمال</p>
                                        <p class="lead">وخدمات الحكومة الإلكترونية</p><br>
                                    </h2>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">

                                    <address>
                                        <strong>سند إستلام</strong>
                                    </address>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                     إسم العميل :  <strong>{{ $product->clients->name }}</strong><br>
                                    اسم العامل  :  <strong>{{ $product->name }}</strong>

                                </div>

                                <div class="col-sm-4 invoice-col">
                                    التاريخ : <strong>{{ date('Y-m-d') }}</strong>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>رقم السند</th>
                                            <th>رقم الهوية</th>
                                            <th>البيان</th>
                                            <th>الإجمالى</th>
                                            <th>حالة السند</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $product->num_saned }}</td>
                                            <td>{{ $product->number }}</td>
                                            <td>{{ $product->type_of_transaction}}</td>
                                            <td>{{ $product->fees + $product->other_fees + $product->other_fee }}</td>
                                            <td>@if($product->status == 'no')
                                                    <span class="btn btn-sm btn-danger">قيد الانتظار</span>
                                                @elseif($product->status == 'yes')
                                                    <span class="btn btn-sm btn-success">تمت المعامله</span>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-6">

                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        <span>س.ت : 4030591475</span><br>
                                        <span>الجوال : 00966126300101 - 00966126304665</span><br>
                                        <span>الرقم الضريبى :   </span>
                                    </p>
                                </div>
                                <div class="col-xs-6">

                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        <span>المستلم</span><br>
                                        <span>الإسم  : --------------------</span><br>
                                        <span>التوقيع : --------------------</span><br>
                                    </p>
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <button class="hidden-print btn btn-info" onclick="myFunction()">Print</button>
                            <script>
                                function myFunction() {
                                    window.print();
                                }
                            </script>
                        </section>

                        <!-- /.content -->
                    </div>
                    <!-- ./wrapper -->


                </div><!-- end of box header -->



            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
