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
                            <li class="breadcrumb-item text-muted">{{ trans('main.todayFollowUps') }}</li>
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
                        @if(Request::is('admin/todayFollowUps'))
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-outline ki-filter fs-2"></i>{{ trans('main.Filter') }}</button>
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                                    <div class="px-7 py-5">
                                        <div class="fs-4 text-gray-900 fw-bold">{{ trans('main.Filter') }}</div>
                                    </div>
                                    <div class="separator border-gray-200"></div>

                                    <form action="{{ route('todayFollowUps.index') }}" method="get">
                                        <div class="px-7 py-5">
                                            <div id="contact_id_filter" class="mb-10">
                                                <label class="form-label fs-5 fw-semibold mb-3">
                                                    <span>{{ trans('main.Contact') }}</span>
                                                </label>
                                                <select name="contact_id" data-control="select2" data-dropdown-parent="#contact_id_filter" class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.All') }}</option>
                                                    <?php
                                                        if(Auth::user()->roles_name[0] == "Admin")
                                                        {
                                                            $contacts = \App\Models\Contact::
                                                            where('is_trashed','!=' ,1)
                                                            ->get(['id','name']);
                                                        }
                                                        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                                        {
                                                            $contacts = \App\Models\Contact::
                                                            where('is_trashed','!=' ,1)
                                                            ->where(function ($query) use ($request) {
                                                                $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                                ->orWhere('created_by', auth()->user()->employee->id)
                                                                ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                                ->orWhere('employee_id', auth()->user()->employee->id);
                                                            })
                                                            ->get(['id','name']);
                                                        }
                                                        else
                                                        {
                                                            $contacts = \App\Models\Contact::
                                                            where('is_trashed','!=' ,1)
                                                            ->where(function ($query) use ($request) {
                                                                $query->where('employee_id', auth()->user()->employee->id)
                                                                ->orWhere('created_by', auth()->user()->employee->id);
                                                            })
                                                            ->get(['id','name']);
                                                        }
                                                    ?>
                                                    @foreach( $contacts as $contact )
                                                        <option value="{{ @$contact->id }}" {{ @$contact->id == @$contact_id ? 'selected' : '' }}>{{ @$contact->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- created_by -->
                                            <div id="created_by_filter" class="mb-10">
                                                <label class="form-label fs-5 fw-semibold mb-3">
                                                    <span>{{ trans('main.Employee') }}</span>
                                                </label>
                                                <select name="created_by" data-control="select2" data-dropdown-parent="#created_by_filter" class="form-select form-select-solid">
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
                                                    @foreach( $employees as $employee )
                                                        <option value="{{ @$employee->id }}" {{ @$employee->id == @$created_by ? 'selected' : '' }}>{{ @$employee->name }}</option>
                                                    @endforeach
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
                        @endif
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center">#</th>
                                        <th class="text-center">{{ trans('main.Customer') }}</th>
                                        <th class="text-center min-w-125px fs-3">{{ trans('main.followUps Date') }}</th>
                                        <th class="text-center">{{ trans('main.Notes') }}</th>
                                        <th class="text-center min-w-150px">{{ trans('main.Employee') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @if($data->count() > 0)
                                        @foreach ($data as $key=>$item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ @$key+1 }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('contact.show', @$item->meeting->contact->id) }}" class="text-gray-800 text-hover-primary mb-1">
                                                        {{ @$item->meeting->contact->name }}
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ @$item->follow_date }}</td>
                                                <td class="text-center">{{ @$item->notes }}</td>
                                                <td class="text-center">{{ @$item->createdBy->name }}</td>
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
            </div>
        </div>
    </div>
</div>
<!--end:::Main-->
@endsection
