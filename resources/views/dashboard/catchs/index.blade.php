@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>سند القبض</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active">سند القبض</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.catchs.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>



                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث</button>
                                @if (auth()->user()->hasPermission('create_catchs'))
                                    <a href="{{ route('dashboard.catchs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضف</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> اضف</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($catch->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>إسم المستفيد</th>
                                <th>قيمة المعامله</th>
                                <th>رقم السند</th>
                                <th>النسبة</th>
                                <th>الأتعاب</th>
                                <th>طريقة الدفع</th>
                                <th>الضريبه </th>
                                <th>وذلك عن</th>
                                <th>أكشن</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($catch as $index=> $cat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$cat->clients->name}}</td>
                                    <td>{{$cat->salary }}</td>
                                    <td>{{$cat->num_saned }}</td>
                                    <td>{{$cat->ratio }}</td>
                                    <td>{{$cat->commission }}</td>
                                    <td>{{$cat->Payment_method }}</td>
                                    <td>{{$cat->dareba }}</td>
                                    <td>{{$cat->about }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_catchs'))
                                            <a href="{{ route('dashboard.catchs.edit', $cat->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>تعديل</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> تعديل)</a>
                                        @endif

                                        @if (auth()->user()->hasPermission('delete_catchs'))
                                            <form action="{{ route('dashboard.catchs.destroy', $cat->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}

                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>حذف</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>حذف</button>
                                       @endif
                                            <a href="{{ route('dashboard.catchs.show', $cat->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> @lang('site.view')</a>

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
