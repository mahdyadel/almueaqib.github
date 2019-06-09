@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.users')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"> @lang('site.users')</a></li>
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

                    <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>الإسم</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image">
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
                            <img src="{{ $user->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>
                        <div class="form-group">
                            <label name="devicenumber" for="sel1">الجنس</label>
                            <select class="form-control" id="sel1" name="gender">
                                <option value="{{ $user->gender }}" {{ $user->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                                <option value="{{ $user->gender }}" {{ $user->gender == 'female'? 'selected' : '' }}>أنثي</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label name="devicenumber" for="sel1">الحاله الاجتماعية</label>
                            <select class="form-control" id="sel1" name="status">
                                <option value="{{ $user->status }}" {{ $user->status == 'married' ? 'selected' : '' }}>متزوج</option>
                                <option value="{{ $user->status }}" {{ $user->status == 'single' ? 'selected' : '' }}>اعزب</option>
                                {{--<option value="married"> متزوج</option>--}}
                                {{--<option value="single"> اعزب</option>--}}

                            </select>
                        </div>
                        <div class="form-group">
                            <label>@lang('site.job')</label>
                            <input type="text" name="job" class="form-control" value="{{ $user->job }}">
                        </div>
                        <div class="form-group">
                            <label>المندوبين</label>
                            <select name="mandoob[]" multiple="multiple" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;">
                                <option value="">المندوبين</option>
                                @foreach ($users as $use)
                                    <option value="{{ $use->name}}" >{{$use->name }}</option>
                                @endforeach
                            </select>

                            @push('scripts')
                                <script>
                                    // In your Javascript (external .js resource or <script> tag)
                                    $(document).ready(function() {
                                        $('.select2').select2();
                                    });
                                </script>
                            @endpush
                        </div>


                        <div class="form-group">
                            <label>@lang('site.Section')</label>
                            <input type="text" name="Section" class="form-control" value="{{ $user->Section }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.birth_date')</label>
                            <input type="date" name="birth_date" class="form-control" value="{{ $user->birth_date }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.Section')</label>
                            <input type="text" name="Section" class="form-control" value="{{ $user->Section }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.address')</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.phone')</label>
                            <input type="number" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        <div class="form-group">
                            *<label>@lang('site.phone2')</label>
                            <input type="number" name="phone2" class="form-control" value="{{ $user->phone2 }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mobile')</label>
                            <input type="number" name="mobile" class="form-control" value="{{ $user->mobile }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mobile2')</label>
                            <input type="number" name="mobile2" class="form-control" value="{{ $user->mobile2 }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.salary')</label>
                            <input type="number" name="salary" class="form-control" value="{{ $user->salary }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.id_number')</label>
                            <input type="number" name="id_number" class="form-control" value="{{ $user->id_number }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.start')</label>
                            <input type="date" name="start" class="form-control" value="{{ $user->start }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.end')</label>
                            <input type="date" name="end" class="form-control" value="{{ $user->end }}">
                        </div>

                        <div class="form-group">
                            <label>الادرات</label>
                            <select name="categroy_id[]" multiple="multiple" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.permissions')</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['users', 'categories', 'products'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                {{--create_users--}}
                                                <label><input type="checkbox" name="permissions[]" {{ $user->hasPermission($map . '_' . $model) ? 'checked' : '' }} value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->

                            </div><!-- end of nav tabs -->

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
