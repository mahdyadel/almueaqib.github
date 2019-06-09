@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>التتقارير</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.baptists.index') }}"> التتقارير</a></li>
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

                    <form action="{{ route('dashboard.baptists.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label>@lang('site.name1')</label>
                            <input type="text" name="name1" class="form-control" value="{{ old('name1') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.name2')</label>
                            <input type="text" name="name2" class="form-control" value="{{ old('name2') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.phone1')</label>
                            <input type="number" name="phone1" class="form-control" value="{{ old('phone1') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.phone2')</label>
                            <input type="number" name="phone2" class="form-control" value="{{ old('phone2') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mobile1')</label>
                            <input type="number" name="mobile1" class="form-control" value="{{ old('mobile1') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mobile2')</label>
                            <input type="number" name="mobile2" class="form-control" value="{{ old('mobile2') }}">
                        </div>
                        
                        <div class="form-group">
                            <label>@lang('site.account1')</label>
                            <input type="text" name="account1" class="form-control" value="{{ old('account1') }}">
                        </div>
                       <div class="form-group">
                            <label>@lang('site.account2')</label>
                            <input type="text" name="account2" class="form-control" value="{{ old('account2') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.bank1')</label>
                            <input type="text" name="bank1" class="form-control" value="{{ old('bank1') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.bank2')</label>
                            <input type="text" name="bank2" class="form-control" value="{{ old('bank2') }}">
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
