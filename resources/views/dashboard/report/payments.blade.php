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
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10 not_print">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap px-0">
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
                            <li class="breadcrumb-item text-muted">{{ trans('main.PaymentsReport') }}</li>
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
                        <form id="meeting_search_form" class="not_print form container-fluid" action="{{ route('report.paymentsReport') }}" method="get" enctype="multipart/form-data">
                            <div class="justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- reorder_reminder_number -->
                                    <div class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Reorder Reminder Number') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.Reorder Reminder Number') }}" name="reorder_reminder_number" type="text" value="{{ @$reorder_reminder_number }}">
                                    </div>
                                    <!-- from_date -->
                                    <div class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.RecorderReminders') }} {{ trans('main.From Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="from_date" type="date" value="{{ @$from_date }}">
                                    </div>
                                    <!-- to_date -->
                                    <div class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.RecorderReminders') }} {{ trans('main.To Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="to_date" type="date" value="{{ @$to_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- invoice_number -->
                                    <div class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Invoice Number') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.Invoice Number') }}" name="invoice_number" type="text" value="{{ @$invoice_number }}">
                                    </div>
                                    <!-- invoice_from_date -->
                                    <div class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Invoices') }} {{ trans('main.From Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.Invoice') }} {{ trans('main.From Date') }}" name="invoice_from_date" type="date" value="{{ @$invoice_from_date }}">
                                    </div>
                                    <!-- invoice_to_date -->
                                    <div class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Invoices') }} {{ trans('main.To Date') }}</label>
                                        <input class="form-control form-control-solid ps-6" placeholder="{{ trans('main.Invoice') }} {{ trans('main.To Date') }}" name="invoice_to_date" type="date" value="{{ @$invoice_to_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- activity_id -->
                                    <div id="activity_id" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Activity') }}</span>
                                        </label>
                                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $activities = App\Models\Activity::get(['id','name']); ?>
                                            @foreach($activities as $activity)
                                                <option value="{{ @$activity->id }}" {{ @$activity->id == @$activity_id ? 'selected' : '' }}>{{ @$activity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- interest_id -->
                                    <div id="interest_id" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Interest') }}</span>
                                        </label>
                                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $subActivities = App\Models\SubActivity::get(['id','name']); ?>
                                            @foreach($subActivities as $subActivity)
                                                <option value="{{ @$subActivity->id }}" {{ @$subActivity->id == @$interests_ids ? 'selected' : '' }}>{{ @$subActivity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- service_id -->
                                    <div id="service_id" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Service') }}</span>
                                        </label>
                                        <select name="service_id" data-control="select2" data-dropdown-parent="#service_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $services = App\Models\Service::get(['id','name']); ?>
                                            @foreach($services as $service)
                                                <option value="{{ @$service->id }}" {{ @$service->id == @$service_id ? 'selected' : '' }}>{{ @$service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- invoice_created_by -->
                                    <div id="invoice_created_by" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.CreatedBy') }} ({{ trans('main.Invoices') }})</span>
                                        </label>
                                        <select name="invoice_created_by" data-control="select2" data-dropdown-parent="#invoice_created_by" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $employees = \App\Models\Employee::hidden()->get(['id','name']);
                                                }
                                                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                                {
                                                    $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                }
                                                else
                                                {
                                                    $employees = \App\Models\Employee::hidden()->where('id', auth()->user()->employee->id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach($employees as $employee)
                                                <option value="{{ @$employee->id }}" {{ @$employee->id == @$created_by ? 'selected' : '' }}>{{ @$employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- created_by -->
                                    <div id="created_by" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.CreatedBy') }} ({{ trans('main.RecorderReminders') }})</span>
                                        </label>
                                        <select name="created_by" data-control="select2" data-dropdown-parent="#created_by" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $employees = \App\Models\Employee::hidden()->get(['id','name']);
                                                }
                                                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                                {
                                                    $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                }
                                                else
                                                {
                                                    $employees = \App\Models\Employee::hidden()->where('id', auth()->user()->employee->id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach($employees as $employee)
                                                <option value="{{ @$employee->id }}" {{ @$employee->id == @$created_by ? 'selected' : '' }}>{{ @$employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- updated_by -->
                                    <div id="updated_by" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.UpdatedBy') }} ({{ trans('main.RecorderReminders') }})</span>
                                        </label>
                                        <select name="updated_by" data-control="select2" data-dropdown-parent="#updated_by" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $employees = \App\Models\Employee::hidden()->get(['id','name']);
                                                }
                                                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                                {
                                                    $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                }
                                                else
                                                {
                                                    $employees = \App\Models\Employee::hidden()->where('id', auth()->user()->employee->id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach($employees as $employee)
                                                <option value="{{ @$employee->id }}" {{ @$employee->id == @$created_by ? 'selected' : '' }}>{{ @$employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- customer_id -->
                                    <div id="customer_id" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Customer') }}</span>
                                        </label>
                                        <select name="customer_id" data-control="select2" data-dropdown-parent="#customer_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $customers = App\Models\Customer::get(['id','name']);
                                                }
                                                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                                {
                                                    $customers = App\Models\Customer::
                                                    // whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                    where(function ($query) {
                                                        $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                        ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                        ->orWhere('created_by', auth()->user()->employee->id)
                                                        ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                        ->orWhere('employee_id', auth()->user()->employee->id);
                                                    })
                                                    ->get(['id','name']);
                                                }
                                                else
                                                {
                                                    $customers = App\Models\Customer::where('employee_id', auth()->user()->employee->id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach($customers as $customer)
                                                <option value="{{ @$customer->id }}" {{ @$customer->id == @$customer_id ? 'selected' : '' }}>{{ @$customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- is_completed -->
                                    <div id="is_completed" class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Status') }}</span>
                                        </label>
                                        <select name="is_completed" data-control="select2" data-dropdown-parent="#is_completed" class="form-select form-select-solid">
                                            <option value="" {{ isset($is_completed)  && is_null($is_completed) ? 'selected' : '' }}>{{ trans('main.All') }}</option>
                                            <option value="0" {{ isset($is_completed) && $is_completed == 0 ? 'selected' : '' }}>{{ trans('main.Not Completed') }}</option>
                                            <option value="1" {{ isset($is_completed) && $is_completed == 1 ? 'selected' : '' }}>{{ trans('main.Completed') }}</option>
                                        </select>
                                    </div>
                                    <!-- search submit -->
                                    @can('عرض تقارير الإيصالات')
                                        <div class="position-relative col-lg-3 me-md-5 me-lg-3">
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

                        @if(Request::is('admin/report/paymentsReport'))
                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button>
                                <div class="table-responsive">
                                    <h1 class="text-center text-decoration-underline">{{ trans('main.PaymentsReport') }}</h1>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                        <thead>
                                            <tr class="text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">{{ trans('main.Invoice Number') }}</th>
                                                <th class="text-center">{{ trans('main.Invoice Date') }}</th>
                                                <th class="text-center">{{ trans('main.Customer') }}</th>
                                                <th class="text-center">{{ trans('main.Total Amount') }}</th>
                                                <th class="text-center">{{ trans('main.Amount Paid') }}</th>
                                                <th class="text-center">{{ trans('main.Dept') }}</th>
                                                <th class="text-center">{{ trans('main.CreatedBy') }}</th>

                                                <th class="text-center">{{ trans('main.Reorder Reminder Number') }}</th>
                                                <th class="text-center">{{ trans('main.Reorder Reminder Date') }}</th>
                                                <th class="text-center">{{ trans('main.Amount') }}</th>
                                                {{-- <th class="text-center">{{ trans('main.Status') }}</th> --}}
                                                <th class="text-center">{{ trans('main.CreatedBy') }}</th>
                                                <th class="text-center">{{ trans('main.Updated By') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @foreach ($data as $key=>$item)
                                                @php
                                                    $totalRevenue = 0;
                                                    foreach ($item as $val) {
                                                        $totalRevenue += $val->revenue;
                                                    }
                                                @endphp
                                                <tr class="text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                    <td class="text-center" rowspan="{{ count($item) }}">
                                                        <a href="@if($item[0]->invoice){{ route('invoice.index', $item[0]->invoice->id) }}@endif" class="text-gray-800 text-hover-primary mb-1" target="_blank">
                                                            @if($item[0]->invoice)
                                                                {{ @$item[0]->invoice->invoice_number }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="text-center" rowspan="{{ count($item) }}">
                                                        @if($item[0]->invoice->invoice_date)
                                                            {{ @$item[0]->invoice->invoice_date }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" rowspan="{{ count($item) }}">
                                                        <a href="@if($item[0]->invoice->customer){{ route('customer.show', $item[0]->invoice->customer->id) }}@endif" class="text-gray-800 text-hover-primary mb-1" target="_blank">
                                                            @if($item[0]->invoice->customer)
                                                                {{ @$item[0]->invoice->customer->name }}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="text-center" rowspan="{{ count($item) }}">
                                                        @if($item[0]->invoice->total_amount)
                                                            {{ number_format(@$item[0]->invoice->total_amount,0) }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" rowspan="{{ count($item) }}">
                                                        @if($item[0]->invoice->amount_paid)
                                                            {{ number_format(@$item[0]->invoice->amount_paid,0) }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" rowspan="{{ count($item) }}">
                                                        @if($item[0]->invoice->debt)
                                                            {{ number_format(@$item[0]->invoice->debt,0) }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" rowspan="{{ count($item) }}">
                                                        @if($item[0]->invoice->createdBy->name)
                                                            {{ @$item[0]->invoice->createdBy->name }}
                                                        @endif
                                                    </td>
                                                    @foreach ($item as $index => $val)
                                                        @if ($index > 0)
                                                            </tr><tr>
                                                        @endif
                                                        <td class="text-center">
                                                            <a href="@if($val->reorder_reminder_number){{ route('receipt.index', $val->id) }}@endif" class="text-gray-800 text-hover-primary mb-1" target="_blank">
                                                                {{ @$val->reorder_reminder_number ?? '---' }}
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ @$val->reminder_date }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ number_format(@$val->expected_amount,0) }}
                                                        </td>
                                                        {{-- <td class="text-center">
                                                            <span style="color: {{ $val->is_completed == 1 ? 'mediumseagreen' : 'red' }}">
                                                                {{ $val->is_completed == 1 ? __('main.Completed') : __('main.Not Completed') }}
                                                            </span>
                                                        </td> --}}
                                                        <td class="text-center">
                                                            {{ @$val->createdBy ? $val->createdBy->name : '---'  }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ @$val->updatedBy ? $val->updatedBy->name : '---' }}
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            <tr style="background-color:#F8F5FF; color:#7239EA">
                                                <td class="text-center" colspan="2">
                                                    {{ trans('main.Total') }}
                                                </td>
                                                <td></td>
                                                <td class="text-center">
                                                    {{ number_format(@$total_amount,0) }}
                                                </td>
                                                <td class="text-center">
                                                    {{ number_format(@$amount_paid,0) }}
                                                </td>
                                                <td class="text-center">
                                                    {{ number_format(@$debt,0) }}
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="not_print">
                                        {{-- {{ @$data->links() }} --}}
                                    </div>
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
