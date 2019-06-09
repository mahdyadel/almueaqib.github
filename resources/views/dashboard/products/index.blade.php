@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.products')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.products') <small>{{ $products->total() }}</small></h3>

                    <form action="{{ route('dashboard.products.index') }}" method="get">

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
                                @if (auth()->user()->hasPermission('create_products'))
                                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($products->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>


                                <th>#</th>
                                <th>اسم الكفيل</th>
                                <th>اسم العامل</th>
                                <th>رقم السند</th>
                                <th>امين الصندوق</th>
                                <th>@lang('site.type_of_transaction')</th>
                                <th>@lang('site.fees')</th>
                                <th>@lang('site.fee')</th>
                                <th>@lang('site.other_fees') </th>
                                <th>@lang('site.other_fee')</th>
                                <th>@lang('site.total')</th>
                                <th>حالة السند</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($products as $index=>$product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->clients->name}}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->num_saned }}</td>
                                    <td>{{ $product->cashiers->name }}</td>
                                    <td>{{ $product->type_of_transaction }}</td>
                                    <td>{{ $product->fees }}</td>
                                    <td>{{ $product->fee}}  </td>
                                    <td>{{ $product->other_fees }}</td>
                                    <td>{{ $product->other_fee }}</td>
                                    <td>
                                         {{ $product->fees + $product->other_fees + $product->other_fee }}
                                  </td>
                                    <td>
                                        @if($product->status == 'no')
                                            <a href="products/{{$product->id}}/status" class="btn btn-sm btn-danger">قيد الانتظار</a>
                                        @elseif($product->status == 'yes')
                                            <span class="btn btn-sm btn-success">تمت المعامله</span>
                                        @endif
                                    <td>
                                @if (auth()->user()->hasPermission('update_products'))
                                        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>

                                @else
                                    @endif
                                @if (auth()->user()->hasPermission('delete_products'))
                                        <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}

                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    </form><!-- end of form -->
                                @else
                                        <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    @endif
                                    <br><br>
                                    <a href="{{ route('dashboard.products.show', $product->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> @lang('site.view')</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table><!-- end of table -->

                        {{ $products->appends(request()->query())->links() }}

                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
