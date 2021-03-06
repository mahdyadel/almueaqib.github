@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>نظام السداد</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.sadads.index') }}">نظام السداد</a></li>
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

                    <form action="{{ route('dashboard.sadads.update', $sadads->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>الكفلاء</label>
                            <select name="client_id" class="form-control select2" style="width: 100%;">
                                {{--<option value="">اختر عميل</option>--}}
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{$sadads->client_id == $client ->id ? 'selected' : '' }}>{{ $client->name }}</option>
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
                            <label>امين الصندوق</label>
                            <select name="cashier_id" class="form-control select2" style="width: 100%;">
                                <option value="">اختر امين صندوق</option>
                                @foreach ($cashiers as $cashier)
                                    <option value="{{ $cashier->id }}" {{$sadads->cashier_id == $cashier ->id ? 'selected' : '' }}>{{ $cashier->name }}</option>
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
                            <label>@lang('site.number')</label>
                            <input type="number" name="number" class="form-control" value="{{ $sadads->number }}">
                        </div>
                        <div class="form-group">
                            <label>رقم السند</label>
                            <input type="number" name="num_saned" class="form-control" value="{{ $sadads->num_saned }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $sadads->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                       
                        <div class="form-group">
                            <label>@lang('site.type_of_transaction')</label>
                            <input type="text" name="type_of_transaction" class="form-control" value="{{ $sadads->type_of_transaction }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.fees')</label>
                            <input type="number" name="fees" class="form-control" value="{{ $sadads->fees }}">
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
