@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>العمالة</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">العمالة</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">العمالة<small>{{ $workers->total() }}</small></h3>

                    <form action="{{ route('dashboard.workers.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="number" name="search" class="form-control" placeholder="إبحث برقم الهوية" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_workers'))
                                    <a href="{{ route('dashboard.workers.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($workers->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                            <th>#</th>
                                <th>اسم الكفيل</th>
                                <th>إسم العامل</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.ardy')</th>
                                <th>@lang('site.address')</th>
                                <th>المعاملات</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($workers as $index=>$worker)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $worker->clients->name}}</td>
                                    <td>{{ $worker->name }}</td>
                                    <td>{{ implode($worker->phone, '-') }}</td>
                                    <td>{{ implode($worker->ardy, '-') }}</td>

                                   
                                    <td>{{ $worker->address }}</td>
                                    <td><a href="{{ route('dashboard.orders.index', ['client_id' => $worker->id]) }}" class="btn btn-info btn-sm">المعاملات المرتبطة</a></td>

                                    <td>
                                    <a href="{{ route('dashboard.workers.show', $worker->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> @lang('site.view')</a>

                                        @if (auth()->user()->hasPermission('update_workers'))
                                            <a href="{{ route('dashboard.workers.edit', $worker->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_workers'))
                                            <form action="{{ route('dashboard.workers.destroy', $worker->id) }}" method="post" style="display: inline-block">
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
                        
                        {{ $workers->appends(request()->query())->links() }}
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
