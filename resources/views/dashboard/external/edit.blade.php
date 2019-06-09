@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>المنفذ الخارجى</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.external.index') }}"> المنفذ الخارجى</a></li>
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

                    <form action="{{ url(route('dashboard.external.update', $externals->id)) }}" method="post">

                        {{ csrf_field() }}
                        @method('put')

                        <div class="form-group">
                            <label>رقم سند الاستلام</label>
                            <input type="number" name="receipt_number" value="{{$externals->receipt_number}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" name="name" value="{{$externals->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>نوع المعاملة</label>
                            <input type="text" name="type_of_transaction" value="{{$externals->type_of_transaction}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>مبلغ التعميد</label>
                            <input type="number" name="amount" value="{{$externals->amount}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>اسم المنفذ</label>
                            <input type="text" name="name_of_operator" value="{{$externals->name_of_operator}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <input type="number" name="phone" value="{{$externals->phone}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>اسم المعمد</label>
                            <input type="text" name="name_of_baptist" value="{{$externals->name_of_baptist}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>مدة التعميد</label>
                            <input type="date" name="duration_of_baptism" value="{{$externals->duration_of_baptism}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
