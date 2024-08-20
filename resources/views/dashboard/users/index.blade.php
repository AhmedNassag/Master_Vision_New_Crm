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
                            <li class="breadcrumb-item text-muted">{{ trans('main.Employees') }}</li>
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
                                    <form action="{{ route('user.index') }}" method="get">
                                        <div class="px-7 py-5">
                                            <!--name-->
                                            <div class="mb-10">
                                                <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Name') }}</label>
                                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" name="name" value="{{ @$name }}" />
                                            </div>
                                            <!--mobile-->
                                            <div class="mb-10">
                                                <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Mobile') }}</label>
                                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" name="mobile" value="{{ @$mobile }}" />
                                            </div>
                                            <!--email-->
                                            <div class="mb-10">
                                                <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Email') }}</label>
                                                <input type="email" class="form-control form-control-solid" placeholder="{{ trans('main.Email') }}" name="email" value="{{ @$email }}" />
                                            </div>
                                            <!--branch_id-->
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">{{ trans('main.Branch') }}</span>
                                                </label>
                                                <select name="branch_id" data-control="select2" data-dropdown-parent="#kt_app_content" class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <?php
                                                        if(Auth::user()->roles_name[0] == "Admin")
                                                        {
                                                            $branches = \App\Models\Branch::get(['id','name']);
                                                        }
                                                        else
                                                        {
                                                            $branches = \App\Models\Branch::where('id', Auth::user()->employee->branch_id)->get(['id','name']);
                                                        }
                                                    ?>
                                                    @foreach($branches as $branch)
                                                        <option value="{{ @$branch->id }}" {{ @$branch->id == @$branch_id ? 'selected' : '' }}>{{ @$branch->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--dept-->
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">{{ trans('main.Department') }}</span>
                                                </label>
                                                <select name="dept" data-control="select2" data-dropdown-parent="#kt_app_content" class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <?php $departments = \App\Models\Department::get(['id','name']); ?>
                                                    @foreach($departments as $department)
                                                        <option value="{{ @$department->id }}" {{ @$department->id == @$dept ? 'selected' : '' }}>{{ @$department->name }}</option>
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
                                <!--begin::Add-->
                                @can('إضافة المستخدمين')
                                    <a type="button" class="btn btn-primary" href="{{ route('user.create') }}">{{ trans('main.Add New') }}</a>
                                @endcan
                                <!--end::Add-->
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
                            <form method="GET" action="{{ url('admin/user') }}">
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
                                        <th class="text-center">#</th>
                                        <th class="text-center">{{ trans('main.Name') }}</th>
                                        <th class="text-center">{{ trans('main.Email') }}</th>
                                        <th class="text-center  min-w-150px">{{ trans('main.Mobile') }}</th>
                                        <th class="text-center">{{ trans('main.Branch') }}</th>
                                        <th class="text-center">{{ trans('main.Department') }}</th>
                                        {{-- <th class="text-center">{{ trans('main.Status') }}</th> --}}
                                        <th class="text-center">{{ trans('main.Role') }}</th>
                                        {{-- <th class="text-center">{{ trans('main.Target') }}</th> --}}
                                        <th class="text-center min-w-70px">{{ trans('main.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @if($data->count() > 0)
                                        @foreach ($data as $key=>$item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ @$key+1 }}
                                                </td>
                                                <td class="text-center">{{ @$item->name }}</td>
                                                <td class="text-center">{{ @$item->email }}</td>
                                                <td class="text-center">{{ @$item->mobile }}</td>
                                                <td class="text-center">{{ @$item->employee->branch->name }}</td>
                                                <td class="text-center">{{ @$item->employee->department->name }}</td>
                                                {{-- <td class="text-center">
                                                    <a href="{{ route('user.changeStatus',@$item->id) }}">
                                                        @if (@$item->status == 1)
                                                            <div class="btn ripple btn-purple-gradient" id='swal-success'>
                                                                <span class="label text-success text-center">
                                                                    {{ app()->getLocale() == 'ar' ? 'مفعل' : 'Active' }}
                                                                </span>
                                                            </div>
                                                        @else
                                                            <div class="btn ripple btn-purple-gradient" id='swal-success'>
                                                                <span class="label text-danger text-center">
                                                                    {{ app()->getLocale() == 'ar' ? 'غير مفعل' : 'InActive' }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </a>
                                                </td> --}}
                                                <td class="text-center">
                                                    @if (!empty(@$item->getRoleNames()))
                                                        @foreach (@$item->getRoleNames() as $v)
                                                            <label class="badge badge-primary">{{ @$v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                {{-- <td class="text-center">{!! $item->target !!}</td> --}}
                                                <td class="text-center">
                                                    @if($item->id != 1)
                                                        <a href="#" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                            {{ trans('main.Actions') }}
                                                            <i class="ki-outline ki-down fs-5 ms-1"></i>
                                                        </a>
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                            @can('تعديل المستخدمين')
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('user.edit', @$item->id) }}" class="menu-link px-3">{{ trans('main.Edit') }}</a>
                                                                </div>
                                                            @endcan
                                                            @can('حذف المستخدمين')
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3"  data-bs-toggle="modal" data-bs-target="#delete_modal_{{ @$item->id }}">{{ trans('main.Delete') }}</a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @include('dashboard.users.deleteModal')
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
