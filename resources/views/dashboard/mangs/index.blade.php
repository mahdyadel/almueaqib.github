@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الإدارات الملحقة</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">الإدارات الملحقة</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.mangs.index') }}" method="get">

                        <div class="row"> 

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_mangs'))
                                    <a href="{{ route('dashboard.mangs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form>

                </div>

                <div class="box-body">

                    @if ($mangs->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.category')</th>
                                <th>@lang('site.fees')</th>
                                <th>@lang('site.fee')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($mangs as $index=>$mang)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $mang->name}}</td>
                                    <td>{{optional($mang->categorios)->name}}</td>
                                    <td>{{ $mang->fees }}</td>
                                    <td>{{ $mang->fee }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_mangs'))
                                            <a href="{{ route('dashboard.mangs.edit', $mang->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_mangs'))
                                            <form action="{{ route('dashboard.mangs.destroy', $mang->id) }}" method="post" style="display: inline-block">
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


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
