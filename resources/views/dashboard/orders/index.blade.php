@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>المعاملات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">المعاملات</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">المعاملات</h3>

                    <form action="{{ route('dashboard.orders.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_orders'))
                                    <a href="{{ route('dashboard.orders.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                    @if ($orders->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>نوع المعاملة</th>
                                <th>@lang('site.number')</th>
                                <th>@lang('site.fees')</th>
                                <th>@lang('site.fee')</th>
                                <th>حالة المعاملة</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            @foreach($orders as $order)
                            <tbody>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $order->clients->name }}</td>
                                    <td>{{ $order->type }}</td>
                                    <td>{{ $order->number }}</td>
                                    <td>{{ $order->fees }}</td>
                                    <td>{{ $order->fee }}</td>
                                    <td>
                                         @if($order->status == 'no')
                                            <a href="order/{{$order->id}}/status" class="btn btn-sm btn-danger"> فى انتظار اتمام المعاملة</a>
                                        @elseif($order->status == 'yes')
                                            <span class="btn btn-success btn-sm "> تمت المعاملة</span>
                                            @endif
                                    </td>
                                   <td>
                                        @if (auth()->user()->hasPermission('update_orders'))
                                            <a href="{{ route('dashboard.orders.edit', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_orders'))
                                            <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                   
                                  
                                </tr>
                                @endforeach

                            </tbody>

                        </table><!-- end of table -->
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


           <!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
