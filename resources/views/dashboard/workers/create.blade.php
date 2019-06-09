@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>العمالة</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.workers.index') }}">العمالة</a></li>
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

                    <form action="{{ route('dashboard.workers.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label>الكفلاء</label>
                            <select name="client_id" class="form-control select2" style="width: 100%;">
                                <option value="">اختر كفيل</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @push('scripts')
                            <script>
                                // In your Javascript (external .js resource or <script> tag)
                                $(document).ready(function() {
                                    $('.select2').select2();
                                });
                            </script>
                        @endpush


                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                       @for ($i = 0; $i < 2; $i++)
                            <div class="form-group">
                                <label>@lang('site.phone')</label>
                                <input type="number" name="phone[]" class="form-control">
                            </div>
                       @endfor

                        @for ($x = 0; $x < 2; $x++)
                            <div class="form-group">
                                <label>@lang('site.ardy')</label>
                                <input type="number" name="ardy[]" class="form-control">
                            </div>
                        @endfor
                        <div class="form-group">
                            <label>@lang('site.address')</label>
                            <textarea name="address" class="form-control">
                                
                            </textarea>
                        </div>

                          <div class="form-group">
                            <label>@lang('site.org')</label>
                            <input type="text" name="org" class="form-control" value="">
                        </div>

                          <div class="form-group">
                            <label>@lang('site.id_number')</label>
                            <input type="number" name="id_number" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.date')</label>
                            <input type="date" name="date" class="form-control" value="">
                        </div>

                          <div class="form-group">
                            <label>@lang('site.re_number')</label>
                            <input type="number" name="re_number" class="form-control" value="">
                        </div>

                         <div class="form-group">
                            <label>@lang('site.post_code')</label>
                            <input type="number" name="post_code" class="form-control" value="">
                        </div>
                         <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="">
                        </div>

                         <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="text" name="password" class="form-control" value="">
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
