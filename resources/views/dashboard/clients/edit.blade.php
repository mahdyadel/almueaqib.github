@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>الكفلاء</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.clients.index') }}">لكفلاء</a></li>
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

                    <form action="{{ route('dashboard.clients.update', $client->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                        </div>

                        @for ($i = 0; $i < 2; $i++)
                            <div class="form-group">
                                <label>@lang('site.phone')</label>
                                <input type="text" name="phone[]" class="form-control" value="{{ $client->phone[$i] ?? '' }}">
                            </div>

                        @endfor

                        @for ($x = 0; $x < 2; $x++)

                        <div class="form-group">
                            <label>@lang('site.ardy')</label>
                            <input type="number" name="ardy[]" class="form-control" value="{{ $client->ardy[$x] ?? '' }}">
                        </div>
                        @endfor

                        <div class="form-group">
                            <label>@lang('site.address')</label>
                            <textarea name="address" class="form-control">{{ $client->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>إسم المنشأه</label>
                            <input type="text" name="org" class="form-control" value="{{ $client->org }}">
                        </div>
                        <div class="form-group">
                            <label>رقم الهويه</label>
                            <input type="text" name="id_number" class="form-control" value="{{ $client->id_number }}">
                        </div>
                        <div class="form-group">
                            <label>التاريخ</label>
                            <input type="text" name="date" class="form-control" value="{{ $client->date }}">
                        </div>
                        <div class="form-group">
                            <label>رقم الإستفدام</label>
                            <input type="text" name="re_number" class="form-control" value="{{ $client->re_number }}">
                        </div>
                        <div class="form-group">
                            <label>الرقم البريدى</label>
                            <input type="number" name="post_code" class="form-control" value="{{ $client->post_code }}">
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكترونى</label>
                            <input type="text" name="email" class="form-control" value="{{ $client->email }}">
                        </div>
                        <div class="form-group">
                            <label>كلمة المرور</label>
                            <input type="text" name="password" class="form-control" value="{{ $client->password }}">
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
