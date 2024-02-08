@extends('layouts.app0')
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
                            @csrf
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row w-100 align-items-center mb-10">
                                    <!-- month -->
                                    <div id="month" class="position-relative col-lg-6 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Month') }}</span>
                                        </label>
                                        <select name="month" data-control="select2" data-dropdown-parent="#month" data-placeholder="{{ trans('main.Month') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Month') }}...</option>
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
                                                <option value="{{ $key }}" {{ $key == @$month ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- search submit -->
                                    <div class="d-flex align-items-center col-lg-1">
                                        <input class="btn btn-primary mt-10" type="submit" value="{{ trans('main.Search') }}" id="filter" name="filter">
                                    </div>
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
                                    <li>{{ $error }}</li>
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
                            <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">#</th>
                                                <th class="text-center px-0">{{ trans('main.Branch') }}</th>
                                                <th class="text-center px-0">{{ trans('main.Target') }}</th>
                                                <th class="text-center min-w-125px ps-0">{{ trans('main.Actual') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if(is_array($data))
                                                @foreach (@$data as $key=>$item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $key+1 }}
                                                        </td>
                                                        <td class="text-center px-0">{{ @$item['branch'] }}</td>
                                                        <td class="text-center px-0">{{ @$item['target'] }}</td>
                                                        <td class="text-center px-0">{{ @$item['actual'] }}</td>
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
