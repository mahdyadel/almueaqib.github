@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>نظام السداد</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">تظام السداد</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">نظام السداد<small>{{ $sadads->total() }}</small></h3>

                    <form action="{{ route('dashboard.sadads.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="إبحث برقم السند" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <select name="category_id" class="form-control">
                                    <option value="">@lang('site.all_categories')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_sadads'))
                                    <a href="{{ route('dashboard.sadads.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($sadads->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>


                                <th>#</th>
                                <th>اسم الكفيل</th>
                                <th>رقم السند</th>
                                <th>امين الصندوق</th>
                                <th>إسم الإدارة</th>
                                <th>@lang('site.type_of_transaction')</th>
                                <th>@lang('site.fees')</th>
                                <th>اجمالى الاتعاب</th>
                                <th>حالة السند</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($sadads as $index=>$sadad)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $sadad->clients->name}}</td>
                                    <td>{{ $sadad->num_saned }}</td>
                                    <td>{{ $sadad->cashiers->name }}</td>
                                    <td>{{ $sadad->category->name }}</td>
                                    <td>{{ $sadad->type_of_transaction }}</td>
                                    <td>{{ $sadad->fees }}</td>
                                    <td>
                                         {{ $sadad->fees *1/100 }}
                                  </td>
                                    <td>
                                        @if($sadad->status == 'no')
                                            <a href="sadads/{{$sadad->id}}/status" class="btn btn-sm btn-danger">قيد الانتظار</a>
                                        @elseif($sadad->status == 'yes')
                                            <span class="btn btn-sm btn-success">تم السداد</span>
                                        @endif
                                    <td>
                                @if (auth()->user()->hasPermission('update_sadads'))
                                        <a href="{{ route('dashboard.sadads.edit', $sadad->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>

                                @else
                                    @endif
                                @if (auth()->user()->hasPermission('delete_sadads'))
                                        <form action="{{ route('dashboard.sadads.destroy', $sadad->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}

                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    </form><!-- end of form -->
                                @else
                                        <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    @endif
                                    <br><br>
                                    <a href="{{ route('dashboard.sadads.show', $sadad->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> @lang('site.view')</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table><!-- end of table -->

                        {{ $sadads->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
