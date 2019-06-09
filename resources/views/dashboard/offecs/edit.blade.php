@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>مكاتب المعقبين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.offecs.index') }}"> مكاتب المعقبين</a></li>
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

                    <form action="{{ route('dashboard.offecs.update', $offec->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $offec->name}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.city')</label>
                            <input type="text" name="city" class="form-control" value="{{ $offec->city}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.phone1')</label>
                            <input type="number" name="phone1" class="form-control" value="{{ $offec->phone1}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.phone2')</label>
                            <input type="number" name="phone2" class="form-control" value="{{ $offec->phone2}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mobile1')</label>
                            <input type="number" name="mobile1" class="form-control" value="{{ $offec->mobile1}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mobile2')</label>
                            <input type="number" name="mobile2" class="form-control" value="{{ $offec->mobile2}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $offec->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>@lang('site.branch')</label>
                            <input type="text" name="branch" class="form-control" value="{{ $offec->branch}}">
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
