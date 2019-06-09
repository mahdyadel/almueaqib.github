@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>التقارير</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">التقارير</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">التقارير </h3>

                    <form action="{{ route('dashboard.reports.index') }}" method="get" class="hidden-print">

                        <div class="row">

                            <div class="col-md-2">
                            <select name = 'search'>
                            <option>اختر الحاله </option>
                            <option value= 'no'>فى انتظار اتمام المعامله</option>
                            <option value= 'yes'>تمت المعامله</option>
                            </select>
                            </div>
                           
                            <div class="col-md-2">
                                <input type="date" name="start" class="form-control" placeholder="@lang('site.search')" value="{{ request()->start }}">
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="end" class="form-control" placeholder="@lang('site.search')" value="{{ request()->end }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                               
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                    @if ($orders->count() > 0)
                   <center> <button class="hidden-print btn btn-info" onclick="myFunction()">إطبع هذه الصفحة</button></center>
                <br> <br>
                    <script>
                        function myFunction() {
                            window.print();
                        }
                    </script>

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
                                            <sapn class="btn btn-sm btn-danger"> فى انتظار اتمام المعاملة</sapn>
                                        @elseif($order->status == 'yes')
                                            <span class="btn btn-success btn-sm "> تمت المعاملة</span>
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
