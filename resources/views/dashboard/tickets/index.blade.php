@extends('layouts.app0')
@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-2x m-0">{{ trans('main.Data List') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ trans('main.Support Tickets') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title"></div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-outline ki-filter fs-2"></i>{{ trans('main.Filter') }}</button>
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                                    <div class="px-7 py-5">
                                        <div class="fs-4 text-gray-900 fw-bold">{{ trans('main.Filter') }}</div>
                                    </div>
                                    <div class="separator border-gray-200"></div>
                                    <form action="{{ route('tickets.index') }}" method="get">
                                        @csrf
                                        <div class="px-7 py-5">
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span>{{ trans('main.Employee') }}</span>
                                                </label>
                                                <select name="assigned_agent_id" data-control="select2" data-dropdown-parent="#kt_app_content" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <?php
                                                        if(Auth::user()->roles_name[0] == "Admin")
                                                        {
                                                            $employees = \App\Models\Employee::get(['id','name']);
                                                        }
                                                        else
                                                        {
                                                            $employees = \App\Models\Employee::where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                        }
                                                    ?>
                                                    @foreach($employees as $employee)
                                                        <option value="{{ @$employee->id }}">{{ @$employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span>{{ trans('main.Customer') }}</span>
                                                </label>
                                                <select name="customer_id" data-control="select2" data-dropdown-parent="#kt_app_content" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <?php
                                                        if(Auth::user()->roles_name[0] == "Admin")
                                                        {
                                                            $customers = \App\Models\Customer::get(['id','name']);
                                                        }
                                                        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                                        {
                                                            $customers = \App\Models\Customer::whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                        }
                                                        else
                                                        {
                                                            $customers = Customer::where('created_by', auth()->user()->employee->id)->get(['id','name']);
                                                        }
                                                    ?>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ @$customer->id }}">{{ @$customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span>{{ trans('main.Type') }}</span>
                                                </label>
                                                <select name="ticket_type" data-control="select2" data-dropdown-parent="#kt_app_content" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <option value="Technical Issue">{{ trans('main.Technical Issue') }}</option>
                                                    <option value="Inquiry">{{ trans('main.Inquiry') }}</option>
                                                    <option value="Request">{{ trans('main.Request') }}</option>
                                                </select>
                                            </div>
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span>{{ trans('main.Status') }}</span>
                                                </label>
                                                <select name="status" data-control="select2" data-dropdown-parent="#kt_app_content" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <option value="Pending">{{ trans('main.Pending') }}</option>
                                                    <option value="Open">{{ trans('main.Open') }}</option>
                                                    <option value="In-Progress">{{ trans('main.In-Progress') }}</option>
                                                    <option value="Resolved">{{ trans('main.Resolved') }}</option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">{{ trans('main.Reset') }}</button>
                                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">{{ trans('main.Apply') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                        <div class="table-responsive">

                            <!-- pagination -->
                            <form method="GET" action="{{ url('admin/tickets') }}">
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

                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">{{ trans('main.Id') }}</th>
                                        <th class="text-center">{{ trans('main.Customer Name') }}</th>
                                        <th class="text-center">{{ trans('main.Ticket Type') }}</th>
                                        <th class="text-center">{{ trans('main.Status') }}</th>
                                        <th class="text-center">{{ trans('main.Created At') }}</th>
                                        <th class="text-center min-w-70px">{{ trans('main.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @if($data->count() > 0)
                                        @foreach ($data as $key=>$item)
                                            <tr>
                                                <td class="text-center">
                                                    TK_{{ @$item->id }}
                                                </td>
                                                <td class="text-center">{{ @$item->customer->name }}</td>
                                                <td class="text-center">
                                                    @if($item->ticket_type == 'Technical Issue')
                                                        {{ trans('main.Technical Issue') }}
                                                    @elseif($item->ticket_type == 'Inquiry')
                                                        {{ trans('main.Inquiry') }}
                                                    @else
                                                        {{ trans('main.Request') }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($item->status == 'Pending')
                                                        <label class="badge badge-light-info">
                                                            {{ trans('main.Pending') }}
                                                        </label>
                                                    @elseif($item->status == 'Open')
                                                        <label class="badge badge-light-danger">
                                                            {{ trans('main.Open') }}
                                                        </label>
                                                    @elseif($item->status == 'In-Progress')
                                                        <label class="badge badge-light-warning">
                                                            {{ trans('main.In-Progress') }}
                                                        </label>
                                                    @else
                                                        <label class="badge badge-light-success">
                                                            {{ trans('main.Resolved') }}
                                                        </label>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{ @$item->created_at->format('Y-m-d') }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('tickets.show', $item->id) }}" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        {{ trans('main.Details') }}
                                                        <i class="ki-outline ki-eye fs-5 ms-1"></i>
                                                    </a>
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
                            {{ @$data->links() }}
                        </div>
                    </div>
                </div>

                @include('dashboard.city.addModal')

            </div>
        </div>
    </div>
</div>
<!--end:::Main-->
@endsection

