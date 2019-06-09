@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>مكاتب المعقبين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.offecs.index') }}"> مكاتب المعقبين</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.offecs.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                        </div>
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <input type="number" name="phone1" class="form-control" value="{{ old('phone1') }}">
                        </div>
                        <div class="form-group">
                            <label>رقم الجوال آخر</label>
                            <input type="number" name="phone2" class="form-control" value="{{ old('phone2') }}">
                        </div>
                        <div class="form-group">
                            <label>رقم ارضى</label>
                            <input type="number" name="mobile1" class="form-control" value="{{ old('mobile1') }}">
                        </div>
                        <div class="form-group">
                            <label>رقم ارضى آخر</label>
                            <input type="number" name="mobile2" class="form-control" value="{{ old('mobile2') }}">
                        </div>
                        <div class="form-group">
                            <label>الإدارة</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>الفئة</label>
                            <input type="text" name="branch" class="form-control" value="{{ old('branch') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
