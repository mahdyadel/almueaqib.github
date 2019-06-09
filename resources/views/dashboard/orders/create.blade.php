@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>المعاملات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.orders.index') }}">المعاملات</a></li>
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

                    <form action="{{ route('dashboard.orders.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                            <div class="form-group">
                                <label>العملاء</label>
                                <select name="client_id" class="form-control select2" style="width: 100%;">
                                    <option value="">اختر عميل</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client _id') == $client ->id ? 'selected' : '' }}>{{ $client->name }}</option>
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
                            <label>نوع الخدمه</label>
                            <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                        </div>
                        <div class="form-group">
                            <label>الهويه</label>
                            <input type="number" name="number" class="form-control" value="{{ old('number') }}">
                        </div>
                        <div class="form-group">
                            <label>الرسوم</label>
                            <input type="number" name="fees" class="form-control" value="{{ old('fees') }}">
                        </div>
                        <div class="form-group">
                            <label>الاتعاب</label>
                            <input type="number" name="fee" class="form-control" value="{{ old('fee') }}">
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
