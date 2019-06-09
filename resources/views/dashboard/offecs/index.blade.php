@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>مكاتب المعقبين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">مكاتب المعقبين</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">مكاتب المعقبين </h3>

                    <form action="{{ route('dashboard.offecs.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                    @if (auth()->user()->hasPermission('create_offecs'))
                                            <a href="{{ route('dashboard.offecs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                        @else
                                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                        @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

               

                    @if ($offec->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                            <th>#</th>
                                <th>الإسم</th>
                                <th>العنوان</th>
                                <th>رقم الجوال</th>
                                <th>رقم جوال آخر</th>
                                <th>رقم ارضي</th>
                                <th>رقم أرضي آخر</th>
                                <th>الإدارة</th>
                                <th>الفئة</th>
                                <th>الإكشن</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($offec as $offecs)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $offecs->name }}</td>
                                    <td>{{ $offecs->city }}</td>
                                    <td>{{ $offecs->phone1 }}</td>
                                    <td>{{ $offecs->phone2 }}</td>
                                    <td>{{ $offecs->mobile1 }}</td>
                                    <td>{{ $offecs->mobile2 }}</td>
                                    <td>{{optional($offecs->category)->name}}</td>
                                    <td>{{ $offecs->branch }}</td>


                                   <td>
                                        @if (auth()->user()->hasPermission('update_offecs'))
                                            <a href="{{ route('dashboard.offecs.edit', $offecs->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_offecs'))
                                            <form action="{{ route('dashboard.offecs.destroy', $offecs->id) }}" method="post" style="display: inline-block">
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




        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
