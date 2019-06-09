<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p> {{auth()->user()->name}} </p>
        <!-- <a href="{{auth()->user()->name}}" style='color:#fff'></i> {{auth()->user()->name}}</a> -->
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-th"></i><span>@lang('site.dashboard')</span></a></li>

            @if (auth()->user()->hasPermission('read_categories'))
                <li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-th"></i><span>@lang('site.categories')</span></a></li>
            @endif
            <li><a href="{{ route('dashboard.mangs.index') }}"><i class="fa fa-th"></i><span>الإدارات الملحقة</span></a></li>


            @if (auth()->user()->hasPermission('read_products'))
                <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-book"></i><span>@lang('site.products')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_clients'))
                <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-th"></i><span>الكفلاء</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_workers'))
                <li><a href="{{ route('dashboard.workers.index') }}"><i class="fa fa-book"></i><span>العمالة</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_users'))
                <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span>@lang('site.users')</span></a></li>
            @endif

            {{--<li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-book"></i><span>@lang('site.categories')</span></a></li>--}}
            {{----}}
            {{----}}



             @if (auth()->user()->hasPermission('read_orders'))
             <li><a href="{{ route('dashboard.orders.index') }}"><i class="fa fa-th"></i><span>المعاملات</span></a></li>
            @endif
              @if (auth()->user()->hasPermission('read_reports'))
             <li><a href="{{ route('dashboard.reports.index') }}"><i class="fa fa-book"></i><span> التقارير</span></a></li>
            @endif
             @if (auth()->user()->hasPermission('read_records'))
             <li><a href="{{ route('dashboard.records.index') }}"><i class="fa fa-th"></i><span>سجل الإدارات</span></a></li>
            @endif
             @if (auth()->user()->hasPermission('read_baptists'))
             <li><a href="{{ route('dashboard.baptists.index') }}"><i class="fa fa-th"></i><span>المعمد والمنفذ</span></a></li>
            @endif
             @if (auth()->user()->hasPermission('read_external'))
             <li><a href="{{ route('dashboard.external.index') }}"><i class="fa fa-th"></i><span>المنفذ الخارجى</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_cashiers'))
                <li><a href="{{ route('dashboard.cashiers.index') }}"><i class="fa fa-th"></i><span>امين الصندوق</span></a></li>
            @endif
              @if (auth()->user()->hasPermission('read_offecs'))
             <li><a href="{{ route('dashboard.offecs.index') }}"><i class="fa fa-book"></i><span>مكاتب المعقبين</span></a></li>
            @endif

             @if (auth()->user()->hasPermission('read_catchs'))
             <li><a href="{{ route('dashboard.catchs.index') }}"><i class="fa fa-book"></i><span>سند القبض </span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_sadads'))
                <li><a href="{{ route('dashboard.sadads.index') }}"><i class="fa fa-book"></i><span>نظام السداد</span></a></li>
            @endif



            {{--@if (auth()->user()->hasPermission('read_receipts'))--}}

             <li><a href="{{ route('dashboard.receipts.index') }}"><i class="fa fa-book"></i><span>سند  الصرف</span></a></li>
            {{--@endif--}}


            {{----}}
            {{----}}

           

            {{----}}
            {{----}}



            {{--<li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i><span>@lang('site.users')</span></a></li>--}}

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>

    </section>

</aside>

