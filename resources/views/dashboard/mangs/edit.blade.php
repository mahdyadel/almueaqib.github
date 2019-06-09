@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الإدارات الملحقة</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.mangs.index') }}">الإدارت الملحقة</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.mangs.update', $mangs->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $mangs->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}  </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $mangs->name}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.fees')</label>
                            <input type="number" name="fees" class="form-control" value="{{ $mangs->fees}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.fee')</label>
                            <input type="number" name="fee" class="form-control" value="{{ $mangs->fee}}">
                        </div>
                             
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
