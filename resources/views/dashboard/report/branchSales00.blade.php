@extends('layouts.app0')

@section('css')
<style>
    @media print {
        .not_print {
            display: none;
        }
    }
</style>
@endsection

@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">{{ trans('main.Data List') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ trans('main.BranchSalesReport') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6 px-lg-0">
                        <!-- Start Search -->
                        <form id="meeting_search_form" class="form container-fluid" action="{{ route('report.branchSalesReport') }}" method="get" enctype="multipart/form-data">
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row w-100 align-items-center mb-10">
                                    <!-- month -->
                                    <div id="month" class="position-relative col-lg-6 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Month') }}</span>
                                        </label>
                                        <select name="month" data-control="select2" data-dropdown-parent="#month" class="form-select form-select-solid" required>
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                $month_format = 'M-Y';
                                                $year_month   = [];
                                                $currentYear = date('Y');
                                                $date        = Carbon\Carbon::create($currentYear, 1, 1);
                                                for ($i = 1; $i <= date('n'); $i++)
                                                {
                                                    $year_month[$date->format('Y-m')] = $date->format($month_format);
                                                    $date->addMonth();
                                                }
                                            ?>
                                            @foreach($year_month as $key => $value)
                                                <option value="{{ @$key }}" {{ @$key == @$month ? 'selected' : '' }}>{{ @$value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- search submit -->
                                    @can('عرض تقارير مبيعات الفروع')
                                        <div class="d-flex align-items-center col-lg-1">
                                            <input class="btn btn-primary mt-10" type="submit" value="{{ trans('main.Search') }}" id="filter" name="filter">
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </form>
                        <!-- End Search -->
                    </div>
                    <div class="card-body pt-0">
                        <!-- validationNotify -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ @$error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- success Notify -->
                        @if (session()->has('success'))
                        <script id="successNotify">
                            window.onload = function() {
                                notif({
                                    msg: "تمت العملية بنجاح",
                                    type: "success"
                                })
                            }
                        </script>
                        @endif

                        <!-- error Notify -->
                        @if (session()->has('error'))
                        <script id="errorNotify">
                            window.onload = function() {
                                notif({
                                    msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                                    type: "error"
                                })
                            }
                        </script>
                        @endif

                        <!-- canNotDeleted Notify -->
                        @if (session()->has('canNotDeleted'))
                        <script id="canNotDeleted">
                            window.onload = function() {
                                notif({
                                    msg: "لا يمكن الحذف لوجود بيانات أخرى مرتبطة بها..!",
                                    type: "error"
                                })
                            }
                        </script>
                        @endif

                        @if(Request::is('admin/report/branchSalesReport'))
                            <div id="print" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                {{-- <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button> --}}
                                <!--begin::Export buttons-->
                                <div id="kt_ecommerce_report_views_export" class="d-none"></div>
                                <!--end::Export buttons-->
                                <!--begin::Export dropdown-->
                                <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-outline ki-exit-up fs-2"></i>{{ trans('main.Export Report') }}</button>
                                    <!--begin::Menu-->
                                    <div id="kt_ecommerce_report_views_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">{{ trans('main.Export as Excel') }}</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                <!--end::Export dropdown-->
                                <!-- pagination -->
                                {{-- <form method="GET" action="{{ url('admin/report/branchSalesReport') }}" class="not_print">
                                    @foreach (request()->except('perPage') as $key => $value)
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach
                                    <select name="perPage" onchange="this.form.submit()">
                                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </form> --}}
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">#</th>
                                                <th class="text-center px-0  min-w-100px">{{ trans('main.Branch') }}</th>
                                                <th class="text-center px-0  min-w-100px">{{ trans('main.Target') }}</th>
                                                <th class="text-center px-0  min-w-125px">{{ trans('main.Actual') }}</th>
                                                <th class="text-center min-w-125px ps-0">{{ trans('main.Margin') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if(is_array($data))
                                                @foreach (@$data as $key=>$item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ @$key+1 }}
                                                        </td>
                                                        <td class="text-center px-0">{{ @$item['branch'] }}</td>
                                                        <td class="text-center px-0">{{ @$item['target'] }}</td>
                                                        <td class="text-center px-0">{{ @$item['actual'] }}</td>
                                                        <td class="text-center px-0">
                                                            {{ @$item['margin'] }}
                                                            <div class="h-8px w-100 bg-light-success rounded">
                                                                <div class="bg-success rounded h-8px" role="progressbar" style="width: {{ @$item['margin'] }};" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th class="text-center" colspan="10">
                                                        <div class="col mb-3 d-flex">
                                                            <div class="card flex-fill">
                                                                <div class="card-body p-3 text-center">
                                                                    <p class="card-text f-12">{{ trans('main.No Data Founded') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end:::Main-->
@endsection



@section('js')
<!-- Print -->
<script type="text/javascript">
    function printDiv() {
        var printContents       = document.getElementById('print').innerHTML;
        var originalContents    = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>



<script src="{{ asset('assets/js/custom/apps/ecommerce/reports/views/views.js') }}"></script>
@endsection
