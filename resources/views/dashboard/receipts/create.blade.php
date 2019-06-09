@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>سند الصرف</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('dashboard.receipts.index') }}">سند الصرف</a></li>
                <li class="active">أضف</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">أضف</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.receipts.store') }}" method="post" enctype="multipart/form-data">

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
                            <label>رقم السند</label>
                            <input type="number" name="num_saned" class="form-control" value="{{ old('num_saned') }}">
                        </div>

                        <div class="form-group">
                            <label>قيمة المعاملة</label>
                            <input type="text" name="salary" class="form-control" value="{{ old('salary') }}">
                        </div>

                        <div class="form-group">
                            <label name="devicenumber" for="sel1">طريقة الدفع</label>
                            <select class="form-control" id="sel1" name="Payment_method">
                                <option> اختر طريقة الدفع</option>
                                <option value="بطاقة مدى"> بطاقة مدى</option>
                                <option value="بطاقة فيزا">بطاقة فيزا</option>
                                <option value="تحويل بنكى">تحويل بنكى</option>
                                <option value="نقدا">نقدا</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>إسم البنك</label>
                            <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name') }}">
                        </div>
                        <div class="form-group">
                            <label>رقم الحواله</label>
                            <input type="number" name="transfer_number" class="form-control" value="{{ old('transfer_number') }}">
                        </div>

                        <div class="form-group">
                            <label>وذلك عن</label>
                            <input type="text" name="about" class="form-control" value="{{ old('about') }}">
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
