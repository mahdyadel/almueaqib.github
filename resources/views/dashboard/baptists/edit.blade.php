@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>المعمد والمنفذ</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.baptists.index') }}"> المعمد والمنفذ</a></li>
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

                    <form action="{{ route('dashboard.baptists.update', $baptists->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>رقم السند</label>
                            <input type="text" name="num_saned" class="form-control" value="{{ $baptists->num_saned}}">
                        </div>
                        <div class="form-group">
                            <label>إسم المعمد</label>
                            <input type="text" name="name1" class="form-control" value="{{ $baptists->name1}}">
                        </div>
                        <div class="form-group">
                            <label>جوال المعمد</label>
                            <input type="number" name="phone1" class="form-control" value="{{ $baptists->phone1}}">
                        </div>
                        <div class="form-group">
                            <label>تليفون المعمد</label>
                            <input type="number" name="mobile1" class="form-control" value="{{ $baptists->mobile1}}">
                        </div>
                        <div class="form-group">
                            <label>رقم حساب المعمد</label>
                            <input type="text" name="account1" class="form-control" value="{{ $baptists->account1}}">
                        </div>
                        <div class="form-group">
                            <label>اسم بنك المعمد</label>
                            <input type="text" name="bank1" class="form-control" value="{{ $baptists->bank1}}">
                        </div>
                        <div class="form-group">
                            <label>إسم المنفذ</label>
                            <input type="text" name="name2" class="form-control" value="{{ $baptists->name2}}">
                        </div>

                        <div class="form-group">
                            <label>جوال المنفذ</label>
                            <input type="number" name="phone2" class="form-control" value="{{ $baptists->phone2}}">
                        </div>

                        <div class="form-group">
                            <label>تليفون المنفذ</label>
                            <input type="number" name="mobile2" class="form-control" value="{{ $baptists->mobile2}}">
                        </div>
                        

                        <div class="form-group">
                            <label>رقم حساب المنفذ</label>
                            <input type="text" name="account2" class="form-control" value="{{ $baptists->account2}}">
                        </div>

                        ><div class="form-group">
                            <label>اسم بنك المنفذ</label>
                            <input type="text" name="bank2" class="form-control" value="{{ $baptists->bank2}}">
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
