@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>سند الصرف</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active">سند الصرف</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.receipts.index') }}" method="get">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث</button>
                                @if (auth()->user()->hasPermission('create_catchs'))
                                    <a href="{{ route('dashboard.receipts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضف</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> اضف</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($receipts->count() > 0)

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المستفيد</th>
                                <th>رقم السند</th>
                                <th>المبلغ</th>
                                <th>طريقة الدفع</th>
                                <th>إسم البنك</th>
                                <th>رقم الحوالة</th>
                                <th> وذلك عن</th>
                                <th>أكشن</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($receipts as $index=> $receipt)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$receipt->clients->name }}</td>
                                    <td>{{$receipt->num_saned }}</td>
                                    <td>{{$receipt->salary }}</td>
                                    <td>{{$receipt->Payment_method }}</td>
                                    <td>{{$receipt->bank_name }}</td>
                                    <td>{{$receipt->transfer_number }}</td>
                                    <td>{{$receipt->about }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_receipts'))
                                            <a href="{{ route('dashboard.receipts.edit', $receipt->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>تعديل</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> تعديل </a>
                                        @endif

                                        @if (auth()->user()->hasPermission('delete_receipts'))
                                            <form action="{{ route('dashboard.receipts.destroy', $receipt->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}

                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>حذف</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>حذف </button>

                                       @endif
                                            <a href="{{ route('dashboard.receipts.show', $receipt->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> @lang('site.view')</a>
                                    </td>
                            @endforeach



                            </tbody>

                        </table><!-- end of table -->



                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
