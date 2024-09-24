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
    <div id="print" class="d-flex flex-column flex-column-fluid">
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
                            <li class="breadcrumb-item text-muted">{{ trans('main.EmployeeSalesReport') }}</li>
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
                        <form id="meeting_search_form" class="not_print form container-fluid" action="{{ route('report.employeeSalesReport') }}" method="get" enctype="multipart/form-data">
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row w-100 align-items-center mb-10">
                                    <!-- branch_id -->
                                    <div id="branches" class="position-relative col-lg-4">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Branch') }}</span>
                                        </label>
                                        <select name="branch_id" data-control="select2" data-dropdown-parent="#branches" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $branches = \App\Models\Branch::get(['id','name']);
                                                }
                                                else
                                                {
                                                    $branches = \App\Models\Branch::where('id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach( $branches as $branch )
                                                <option value="{{ @$branch->id }}" {{ @$branch->id == @$branch_id ? 'selected' : '' }}>{{ @$branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- employee_id -->
                                    <div id="employee_id" class="position-relative col-lg-4">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Employee') }}</span>
                                        </label>
                                        <select name="employee_id" data-control="select2" data-dropdown-parent="#employee_id" class="form-select form-select-solid">
                                            <option value="" selected>{{ trans('main.All') }}</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $employees = \App\Models\Employee::hidden()->get(['id','name']);
                                                }
                                                else
                                                {
                                                    $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach($employees as $employee)
                                                <option value="{{ @$employee->id }}" {{ $employee->id == @$employee_id ? 'selected' : '' }}>{{ @$employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- month -->
                                    <div id="month" class="position-relative col-lg-4">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Month') }}</span>
                                        </label>
                                        <select name="month" data-control="select2" data-dropdown-parent="#month" class="form-select form-select-solid" required>
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                $month_format = 'M-Y';
                                                $year_month   = [];
                                                $currentYear  = date('Y');
                                                $date = Carbon\Carbon::create($currentYear, 1, 1);
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
                                    @can('عرض تقارير مبيعات الموظفين')
                                        <div class="d-flex align-items-center col-1">
                                            <input class="not_print btn btn-primary mt-10" type="submit" value="{{ trans('main.Search') }}" id="filter" name="filter">
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

                        @if(Request::is('admin/report/employeeSalesReport'))
                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button>
                                <!-- pagination -->
                                {{-- <form method="GET" action="{{ url('admin/report/employeeSalesReport') }}" class="not_print">
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
                                    <h1 class="text-center text-decoration-underline">{{ trans('main.EmployeeSalesReport') }}</h1>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">#</th>
                                                <th class="text-center">{{ trans('main.Employee') }}</th>
                                                <th class="text-center">{{ trans('main.Branch') }}</th>
                                                <!--amount-->
                                                <th class="text-center min-w-125px">{{ trans('main.TargetAmount') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.ActualAmount') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.MarginAmount') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Customers Number') }}</th>
                                                <!--calls_with_repeater-->
                                                <th class="text-center min-w-125px">{{ trans('main.TargetCallsWithRepeater') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.ActualCallsWithRepeater') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.MarginCallsWithRepeater') }}</th>
                                                <!--calls_without_repeater-->
                                                <th class="text-center min-w-125px">{{ trans('main.TargetCallsWithoutRepeater') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.ActualCallsWithoutRepeater') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.MarginCallsWithoutRepeater') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if(is_array($data))
                                                @foreach (@$data as $key=>$item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ @$key+1 }}
                                                        </td>
                                                        <td class="text-center">{{ @$item['employee'] }}</td>
                                                        <td class="text-center">{{ @$item['branch'] }}</td>
                                                        <!--amount-->
                                                        <td class="text-center">{{ number_format(@$item['target_amount'], 0) }}</td>
                                                        <td class="text-center">{{ number_format(@$item['actual_amount'], 0) }}</td>
                                                        <td class="text-center">
                                                            {{ @$item['margin_amount'] }}
                                                            <div class="h-8px w-100 bg-light-success rounded">
                                                                <div class="bg-success rounded h-8px" role="progressbar" style="width: {{ @$item['margin_amount'] }};" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">{{ @$item['customers_count'] }}</td>
                                                        <!--calls_with_repeater-->
                                                        <td class="text-center">{{ number_format(@$item['target_calls_with_repeater'], 0) }}</td>
                                                        <td class="text-center">{{ number_format(@$item['actual_calls_with_repeater'], 0) }}</td>
                                                        <td class="text-center">
                                                            {{ @$item['margin_calls_with_repeater'] }}
                                                            <div class="h-8px w-100 bg-light-success rounded">
                                                                <div class="bg-success rounded h-8px" role="progressbar" style="width: {{ @$item['margin_calls_with_repeater'] }};" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <!--calls_without_repeater-->
                                                        <td class="text-center">{{ number_format(@$item['target_calls_without_repeater'], 0) }}</td>
                                                        <td class="text-center">{{ number_format(@$item['actual_calls_without_repeater'], 0) }}</td>
                                                        <td class="text-center">
                                                            {{ @$item['margin_calls_without_repeater'] }}
                                                            <div class="h-8px w-100 bg-light-success rounded">
                                                                <div class="bg-success rounded h-8px" role="progressbar" style="width: {{ @$item['margin_calls_without_repeater'] }};" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="branch_id"]').on('change', function() {
                var branch_id = $(this).val();
                if (branch_id) {
                    $.ajax({
                        url: "{{URL::to('admin/employeeByBranchId')}}/" + branch_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="employee_ids[]"]').empty();
                            $('select[name="employee_ids[]"]').append('<option class="form-control" value="" selected>All</option>');
                            $.each(data, function(key, value) {
                                $('select[name="employee_ids[]"]').append('<option class="form-control" value="' + value["id"] + '">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="employee_ids[]"]').empty();
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
@endsection
