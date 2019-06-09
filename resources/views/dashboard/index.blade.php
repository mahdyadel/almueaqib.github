@inject('client' , 'App\Client')
@inject('user' , 'App\User')
@inject('record' , 'App\Record')
@inject('product' , 'App\Product')
@inject('offec' , 'App\Offec')
@inject('order' , 'App\Order')

@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1 class="m-4">@lang('site.dashboard')</h1>
            <br><br>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>

            <!-- clients -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">العملاء</span>
                        <span class="info-box-number">{{$client->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- end of clirnt -->
            <!-- clients -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-#rrs"><i class="fa fa-user-secret"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">المشرفين</span>
                        <span class="info-box-number">{{$user->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- end of clirnt -->

            <!-- order -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion-ios-calendar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">المعاملات  </span>
                        <span class="info-box-number">{{$order->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- end of the order -->
            <!-- record -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion-ios-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">سجل الادارات </span>
                        <span class="info-box-number">{{$record->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- end of the record -->
            <!-- offec -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion-ios-albums"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">مكاتب المعقبين  </span>
                        <span class="info-box-number">{{$offec->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- end of the offec -->
            <br>  <br>

            <!-- product -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">سند الاستلام</span>
                        <span class="info-box-number">{{$product->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- end of the peoducts -->


        </section>

        <section class="content">



        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
