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
                        <form id="meeting_search_form" class="form container-fluid" action="{{ route('report.employeeSalesReport') }}" method="get" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row w-100 align-items-center mb-10">
                                    <!-- branch_id -->
                                    <div id="branches" class="position-relative col-lg-5 me-md-2">
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
                                    <!-- month -->
                                    <div id="month" class="position-relative col-lg-5 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Month') }}</span>
                                        </label>
                                        <select name="month" data-control="select2" data-dropdown-parent="#month" class="form-select form-select-solid">
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

                        @if(Request::is('admin/report/employeeSalesReport'))
                            <div id="print" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button>
                                <!-- pagination -->
                                <form method="GET" action="{{ url('admin/report/employeeSalesReport') }}" class="not_print">
                                    @foreach (request()->except('perPage') as $key => $value)
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach
                                    <select name="perPage" onchange="this.form.submit()">
                                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </form>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">#</th>
                                                <th class="text-center">{{ trans('main.Employee') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Target') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Actual') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Margin') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Customers Number') }}</th>
                                                <th class="text-center">{{ trans('main.Branch') }}</th>
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
                                                        <td class="text-center">{{ @$item['target'] }}</td>
                                                        <td class="text-center">{{ @$item['actual'] }}</td>
                                                        <td class="text-center">{{ @$item['margin'] }}</td>
                                                        <td class="text-center">{{ @$item['customers_count'] }}</td>
                                                        <td class="text-center">{{ @$item['branch'] }}</td>
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
@endsection
