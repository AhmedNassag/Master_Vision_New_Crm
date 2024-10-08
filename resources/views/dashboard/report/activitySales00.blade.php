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
<div class="app-main flex-column flex-row-fluid" id="print">
    <div id="" class="d-flex flex-column flex-column-fluid">
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
                            <li class="breadcrumb-item text-muted">{{ trans('main.ActivitySalesReport') }}</li>
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
                        <form id="meeting_search_form" class="form container-fluid" action="{{ route('report.activitySalesReport') }}" method="get" enctype="multipart/form-data">
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row w-100 align-items-center mb-10">
                                    <!-- activity_id -->
                                    <div id="activities" class="position-relative col-lg-2 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Activity') }}</span>
                                        </label>
                                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activities" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}...</option>
                                            <?php $activities = App\Models\Activity::get(['id', 'name']); ?>
                                            @foreach( $activities as $activity )
                                            <option value="{{ @$activity->id }}" {{ @$activity->id == @$activity_id ? 'selected' : '' }}>{{ @$activity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- interest_id -->
                                    <div id="interest_id" class="position-relative col-lg-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.SubActivity') }}</span>
                                        </label>
                                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>

                                        </select>
                                    </div>
                                    <!-- from_date -->
                                    <div class="position-relative col-lg-3 me-md-2">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.From Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="from_date" type="date" value="{{ @$from_date }}">
                                    </div>
                                    <!-- to_date -->
                                    <div class="position-relative col-lg-3 me-md-2">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.To Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="to_date" type="date" value="{{ @$to_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="d-flex align-items-center mb-10">
                                    <!-- search submit -->
                                    @can('عرض تقارير مبيعات الأنشظة')
                                        <div class="d-flex align-items-center">
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

                        @if(Request::is('admin/report/activitySalesReport'))
                        <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button>
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
                                {{-- <form method="GET" action="{{ url('admin/report/activitySalesReport') }}" class="not_print">
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
                                                <th class="text-center">{{ trans('main.Activity') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.SubActivity') }}</th>
                                                <th class="text-center">{{ trans('main.Sales') }}</th>
                                                <th class="text-center min-w-150px">{{ trans('main.Paid Amounts') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Remaining Amounts') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if(is_array($data))
                                            @foreach (@$data as $key=>$item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ @$key+1 }}
                                                </td>
                                                <td class="text-center">{{ @$item['activity'] }}</td>
                                                <td class="text-center">{{ @$item['sub_activity'] }}</td>
                                                <td class="text-center">{{ @$item['total_sales'] }}</td>
                                                <td class="text-center">{{ @$item['paid_amount'] }}</td>
                                                <td class="text-center">{{ @$item['remaining_amounts'] }}</td>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="activity_id"]').on('change', function() {
            var activity_id = $(this).val();
            if (activity_id) {
                $.ajax({
                    url: "{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="interest_id"]').empty();
                        $('select[name="interest_id"]').append('<option class="form-control" value="">' + "{{ __('main.All') }}" + '</option>');
                        $.each(data, function(key, value) {
                            $('select[name="interest_id"]').append('<option class="form-control" value="' + value["id"] + '">' + value["name"] + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="interest_id"]').empty();
                console.log('not work')
            }
        });
    });
</script>

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
