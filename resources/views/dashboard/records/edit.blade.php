@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>السجلات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.records.index') }}"> السجلات</a></li>
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

                    <form action="{{ route('dashboard.records.update', $records->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $records->name}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.phone')</label>
                            <input type="number" name="phone" class="form-control" value="{{ $records->phone}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="text" name="email" class="form-control" value="{{ $records->email}}">
                        </div>
                        <div class="form-group">
                            <label>لينك الموقع</label>
                            <input type="text" name="web" class="form-control" value="{{ $records->web}}">
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
