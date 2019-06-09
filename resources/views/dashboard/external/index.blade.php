@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>المنفذ الخارجى</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">المنفذ الخارجى</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">المنفذ الخارجى <small>{{ $externals->total() }}</small></h3>

                    <form action="{{ route('dashboard.external.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_external'))
                                    <a href="{{ route('dashboard.external.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($externals->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>رقم سند الاستلام</th>
                                <th>الاسم</th>
                                <th>نوع المعامله</th>
                                <th>اسم المنفذ</th>
                                <th>رقم الجوال</th>
                                <th>اسم المعمد</th>
                                <th>مدة التعميد</th>
                                <th>حالة المعامله</th>
                                <th>الادوات</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($externals as $external)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $external->receipt_number }}</td>
                                    <td>{{ $external->name }}</td>
                                    <td>{{ $external->type_of_transaction}}</td>
                                    <td>{{ $external->amount}}</td>
                                    <td>{{ $external->phone}}</td>
                                    <td>{{ $external->name_of_baptist}}</td>
                                    <td>{{ $external->duration_of_baptism}}</td>
                                    <td>
                                        @if($external->status == 'no')
                                        <a href="external/{{$external->id}}/status" class="btn btn-sm btn-danger"> فى انتظار اتمام المعاملة</a>
                                        @elseif($external->status == 'yes')
                                            <span class="btn btn-success btn-sm "> تمت المعاملة</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_external'))
                                            <a href="{{ route('dashboard.external.edit', $external->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_external'))
                                            <form action="{{ route('dashboard.external.destroy', $external->id) }}" method="post" style="display: inline-block">
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

                        {{ $externals->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
