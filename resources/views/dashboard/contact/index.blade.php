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
                            <li class="breadcrumb-item text-muted">{{ trans('main.Contacts') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="px-0 app-container container-xxl ">

                <div class="d-lg-flex flex-lg-row">
                    <div class="col-lg-2 me-4">
                        <div class="card card-flush">
                            <!--begin::Card header-->
                            <div class="card-header pt-7 ps-3" id="kt_chat_contacts_header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h3>{{ trans('main.Contacts') }}</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-5 px-3">
                                <!--begin::Contact groups-->
                                <div class="d-flex flex-column gap-5">
                                    <!--begin::Contact group-->
                                    <div class="d-flex flex-stack">
                                        <a href="{{ route('contact.index') }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">{{ trans('main.All') }}</a>
                                        <?php
                                            if(Auth::user()->roles_name[0] == "Admin")
                                            {
                                                $all_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->count();
                                            }
                                            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                            {
                                                $all_contacts = App\Models\Contact::where('is_trashed','!=' ,1)
                                                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                ->where(function ($query) {
                                                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('created_by', auth()->user()->employee->id)
                                                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('employee_id', auth()->user()->employee->id);
                                                })
                                                ->count();
                                            }
                                            else
                                            {
                                                $all_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('employee_id', auth()->user()->employee->id)->count();
                                            }
                                        ?>
                                        <div class="badge badge-light-primary">{{ @$all_contacts }}</div>
                                    </div>
                                    <!--begin::Contact group-->
                                    <!--begin::Contact group-->
                                    <div class="d-flex flex-stack">
                                        <a href="{{ route('contact.index', ['status' => 'new']) }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">{{ trans('main.New') }}</a>
                                        <?php
                                            if(Auth::user()->roles_name[0] == "Admin")
                                            {
                                                $new_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'new')->count();
                                            }
                                            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                            {
                                                $new_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)
                                                ->where('status', 'new')
                                                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                ->where(function ($query) {
                                                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('created_by', auth()->user()->employee->id)
                                                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('employee_id', auth()->user()->employee->id);
                                                })
                                                ->count();
                                            }
                                            else
                                            {
                                                $new_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'new')->where('employee_id', auth()->user()->employee->id)->count();
                                            }
                                        ?>
                                        <div class="badge badge-light-success">{{ @$new_contacts}}</div>
                                        <form action="{{ route('contact.index') }}" method="get" id="new_contacts" style="display: none">
                                            <input type="hidden" name="status" value="new" />
                                        </form>
                                    </div>
                                    <!--begin::Contact group-->
                                    <!--begin::Contact group-->
                                    <div class="d-flex flex-stack">
                                        <a href="{{ route('contact.index', ['status' => 'contacted']) }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">{{ trans('main.Contacted') }}</a>
                                        <?php
                                            if(Auth::user()->roles_name[0] == "Admin")
                                            {
                                                $contacted_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'contacted')->count();
                                            }
                                            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                            {
                                                $contacted_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'contacted')
                                                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                ->where(function ($query) {
                                                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('created_by', auth()->user()->employee->id)
                                                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('employee_id', auth()->user()->employee->id);
                                                })
                                                ->count();
                                            }
                                            else
                                            {
                                                $contacted_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'contacted')->where('employee_id', auth()->user()->employee->id)->count();
                                            }
                                        ?>
                                        <div class="badge badge-light-secondary">{{ @$contacted_contacts }}</div>
                                        <form action="{{ route('contact.index') }}" method="get" id="contacted_contacts" style="display: none">
                                            <input type="hidden" name="status" value="contacted" />
                                        </form>
                                    </div>
                                    <!--begin::Contact group-->
                                    <!--begin::Contact group-->
                                    <div class="d-flex flex-stack">
                                        <a href="{{ route('contact.index', ['status' => 'qualified']) }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">{{ trans('main.Qualified') }}</a>
                                        <?php
                                            if(Auth::user()->roles_name[0] == "Admin")
                                            {
                                                $qualified_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'qualified')->count();
                                            }
                                            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                            {
                                                $qualified_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'qualified')
                                                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                ->where(function ($query) {
                                                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('created_by', auth()->user()->employee->id)
                                                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('employee_id', auth()->user()->employee->id);
                                                })
                                                ->count();
                                            }
                                            else
                                            {
                                                $qualified_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'qualified')->where('employee_id', auth()->user()->employee->id)->count();
                                            }
                                        ?>
                                        <div class="badge badge-light-warning">{{ @$qualified_contacts }}</div>
                                        <form action="{{ route('contact.index') }}" method="get" id="qualified_contacts" style="display: none">
                                            <input type="hidden" name="status" value="qualified" />
                                        </form>
                                    </div>
                                    <!--begin::Contact group-->
                                    <!--begin::Contact group-->
                                    <div class="d-flex flex-stack">
                                        <a href="{{ route('contact.index', ['status' => 'converted']) }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">{{ trans('main.Converted') }}</a>

                                        <?php
                                            if(Auth::user()->roles_name[0] == "Admin")
                                            {
                                                $converted_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'converted')->count();
                                            }
                                            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                            {
                                                $converted_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'converted')
                                                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                ->where(function ($query) {
                                                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('created_by', auth()->user()->employee->id)
                                                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('employee_id', auth()->user()->employee->id);
                                                })
                                                ->count();
                                            }
                                            else
                                            {
                                                $converted_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', '!=' ,0)->where('status', 'converted')->where('employee_id', auth()->user()->employee->id)->count();
                                            }
                                        ?>
                                        <div class="badge badge-light-info">{{ @$converted_contacts }}</div>
                                        <form action="{{ route('contact.index') }}" method="get" id="converted_contacts" style="display: none">
                                            <input type="hidden" name="status" value="converted" />
                                        </form>
                                    </div>
                                    <!--begin::Contact group-->
                                    <!--begin::Contact group-->
                                    <div class="d-flex flex-stack">
                                        <a href=""{{ route('contact.index', ['is_active' => 0]) }}"" onclick="event.preventDefault();document.getElementById('inActive_contacts').submit();" class="fs-6 fw-bold text-gray-800 text-hover-primary">{{ trans('main.InActive') }}</a>
                                        <?php
                                            if(Auth::user()->roles_name[0] == "Admin")
                                            {
                                                $inActive_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', 0)->count();
                                            }
                                            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                            {
                                                $inActive_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', 0)
                                                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                ->where(function ($query) {
                                                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('created_by', auth()->user()->employee->id)
                                                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('employee_id', auth()->user()->employee->id);
                                                })
                                                ->count();
                                            }
                                            else
                                            {
                                                $inActive_contacts = App\Models\Contact::where('is_trashed','!=' ,1)->where('is_active', 0)->where('employee_id', auth()->user()->employee->id)->count();
                                            }
                                        ?>
                                        <div class="badge badge-light-dark">{{ @$inActive_contacts }}</div>
                                        <form action="{{ route('contact.index') }}" method="get" id="inActive_contacts" style="display: none">
                                            <input type="hidden" name="is_active" value="0" />
                                        </form>
                                    </div>
                                    <!--begin::Contact group-->
                                    <!--begin::Contact group-->
                                    <div class="d-flex flex-stack">
                                        <a href="{{ route('contact.trashed') }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">{{ trans('main.Trashed') }}</a>
                                        <?php
                                            if(Auth::user()->roles_name[0] == "Admin")
                                            {
                                                $trashed_contacts = App\Models\Contact::where('is_trashed', 1)->count();
                                            }
                                            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                            {
                                                $trashed_contacts = App\Models\Contact::where('is_trashed', 1)
                                                // ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
                                                ->where(function ($query) {
                                                    $query->whereRelation('createdBy', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhereRelation('employee', 'branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('created_by', auth()->user()->employee->id)
                                                    ->orWhere('branch_id', auth()->user()->employee->branch_id)
                                                    ->orWhere('employee_id', auth()->user()->employee->id);
                                                })
                                                ->count();
                                            }
                                            else
                                            {
                                                $trashed_contacts = App\Models\Contact::where('is_trashed', 1)->where('employee_id', auth()->user()->employee->id)->count();
                                            }
                                        ?>
                                        <div class="badge badge-light-danger">{{ @$trashed_contacts }}</div>
                                    </div>
                                    <!--begin::Contact group-->
                                </div>
                                <!--end::Contact groups-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>


                    <div class="col-lg-10 card">
                        <!--single_selected-->
                        <div class="card-header border-0 pt-lg-6 px-3  ">
                            <div class="card-title"></div>
                            <div class="card-toolbar mx-lg-3">
                                <div id="single_selected_div" class="d-flex justify-content-end " data-kt-customer-table-toolbar="base">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-light-primary me-3 col-sm-2 col-lg-4 col-xl-4  fs-6" data-bs-toggle="modal" data-bs-target="#filterModal">
                                        <i class="ki-outline ki-filter fs-2"></i>
                                        {{ trans('main.Filter') }}
                                    </button>
                                    <!--end::Filter-->
                                    <!--begin::Import-->
                                    @can('إستيراد جهات الإتصال')
                                        <button type="button" class="btn btn-light-primary me-3 col-sm-2 col-lg-4 col-xl-4  fs-6" data-bs-toggle="modal" data-bs-target="#importModal">
                                            <i class="ki-outline ki-exit-down fs-2"></i>{{ trans('main.Import') }}
                                        </button>
                                    @endcan
                                    @include('dashboard.contact.importModal')
                                    <!--end::Import-->
                                    <!--begin::Export-->
                                    @can('تصدير جهات الإتصال')
                                        <a type="button" class="btn btn-light-primary me-3 col-sm-2 col-lg-4 col-xl-4  fs-6" href="{{ route('contact.exportView') }}">
                                            <i class="ki-outline ki-exit-up fs-2"></i>{{ trans('main.Export') }}
                                        </a>
                                    @endcan
                                    <!--end::Export-->
                                    <!--begin::Add-->
                                    @can('إضافة جهات الإتصال')
                                        <a type="button" class="btn btn-primary col-sm-2 col-lg-4 col-xl-4 px-2 fs-6" href="{{ route('contact.create') }}">{{ trans('main.Add New') }}</a>
                                    @endcan
                                    <!--end::Add-->
                                </div>

                            </div>
                        </div>
                        <!--Search With Mobile || Mobile-->
                        <div class="container">
                            <form action="{{ route('contact.index') }}" method="GET" class="col-12 mt-5">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Search With Name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="{{ trans('main.Search With Name') }}..." value="{{ @$name }}">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Search With Mobile') }}</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="{{ trans('main.Search With Mobile') }}..." value="{{ @$mobile }}">
                                    </div>
                                    <div class="col-4 mt-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ki-outline ki-eye fs-2"></i>
                                            {{ trans('main.Search') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--multi_selected-->
                        <div class="card-header border-0 pt-lg-6 px-3  ">
                            <div class="card-title"></div>
                            <div class="card-toolbar">
                                <div id="multi_selected_div" class="d-flex justify-content-sm-start  justify-content-lg-end flex-wrap" data-kt-customer-table-toolbar="base" style="display: none">
                                    <div class="m-1">
                                        @can('إرسال رسائل جهات الإتصال')
                                            <button id="btn_message_selected" type="button" class="btn btn-sm btn-light-success" data-bs-toggle="modal" data-bs-target="#message_selected" style="display: none">
                                                <i class="ki-duotone ki-whatsapp ">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                {{ trans('main.Send') }} {{ trans('main.Message') }}
                                            </button>
                                        @endcan
                                    </div>
                                    @if(Request::is('admin/contactTrashed','admin/contactTrashed/*'))
                                        <div class="m-1">
                                            @can('أرشفة جهات الإتصال')
                                                <button id="btn_trash_selected" type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#trash_selected" style="display: none">
                                                    {{ trans('main.Restore From Trash') }}
                                                </button>
                                            @endcan
                                        </div>
                                        @else
                                        <div class="m-1">
                                            @can('أرشفة جهات الإتصال')
                                                <button id="btn_trash_selected" type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#trash_selected" style="display: none">
                                                    {{ trans('main.Send To Trash') }}
                                                </button>
                                            @endcan
                                        </div>
                                    @endif
                                    <div class="m-1">
                                        @can('تغيير حالات تنشيط جهات الإتصال')
                                            <button id="btn_activate_selected" type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#activate_selected" style="display: none">
                                                {{ trans('main.Change Active Status') }}
                                            </button>
                                        @endcan
                                    </div>
                                    <div class="m-1">
                                        @can('تعديل جهات الإتصال')
                                            <button id="btn_relate_selected" type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#relate_selected" style="display: none">
                                                {{ trans('main.Relate Employee') }}
                                            </button>
                                        @endcan
                                    </div>
                                    <div class="m-1">
                                        @can('حذف جهات الإتصال')
                                            <button id="btn_delete_selected" type="button" class="btn btn-sm btn-danger" style="display: none">
                                                {{ trans('main.Delete') }}
                                            </button>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 px-1">


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

                            <!-- Imported Contacts -->
                            @if (session()->has('rowsSavedCount') && session()->has('rowsSkippedCount'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li class="text-success">{{ trans('main.Rows Saved') }}: {{ session('rowsSavedCount') }}</li>
                                        <li class="text-danger">{{ trans('main.Rows Skipped') }}: {{ session('rowsSkippedCount') }}</li>
                                    </ul>
                                </div>
                            @endif

                            <div class="table-responsive">
                                @if(request()->query())
                                    <div class="alert">
                                            {{ trans('main.Results Count') }} : <span style="font-weight:bold; color: #000">{{ @$resultCount }}</span>
                                    </div>
                                @endif
                                <!-- pagination -->
                                <form method="GET" action="{{ url('admin/contact') }}">
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

                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="example1">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.8906px;">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="box1 form-check-input" name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" oninput="showBtnDeleteSelected()">
                                                </div>
                                            </th>
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ trans('main.Status') }}</th>
                                            <th class="text-center">{{ trans('main.Code') }}</th>
                                            <th class="text-center">{{ trans('main.Name') }}</th>
                                            <th class="text-center px-0">{{ trans('main.Mobile') }}</th>
                                            <th class="text-center min-w-150px">{{ trans('main.Source') }}</th>
                                            <th class="text-center">{{ trans('main.Area') }}</th>
                                            <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                            <th class="text-center">{{ trans('main.Related Employee') }}</th>
                                            <th class="text-center">{{ trans('main.Active Status') }}</th>
                                            <th class="text-center">{{ trans('main.CreatedBy') }}</th>
                                            <th class="text-center min-w-70px">{{ trans('main.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @if($data->count() > 0)
                                        @foreach ($data as $key=>$item)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input id="delete_selected_input" type="checkbox" value="{{ @$item->id }}" class="box1 form-check-input" oninput="showBtnDeleteSelected()">
                                                </div>
                                            </td>
                                            <td class="text-center"> {{ $key + 1 }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('contact.show', $item->id) }}">
                                                    @if (@$item->status == 'new')
                                                        <label class="badge badge-light-success">
                                                            {{ app()->getLocale() == 'ar' ? 'جديد' : 'New' }}
                                                        </label>
                                                    @elseif(@$item->status == 'contacted')
                                                        <label class="badge badge-light-primary">
                                                            {{ app()->getLocale() == 'ar' ? 'تم التواصل' : 'Contacted' }}
                                                        </label>
                                                    @elseif(@$item->status == 'qualified')
                                                        <label class="badge badge-light-info">
                                                            {{ app()->getLocale() == 'ar' ? 'مؤهل' : 'Qualified' }}
                                                        </label>
                                                    @elseif(@$item->status == 'converted')
                                                        <label class="badge badge-light-dark">
                                                            {{ app()->getLocale() == 'ar' ? 'تم التحويل/البيع' : 'Converted' }}
                                                        </label>
                                                    @else
                                                        <div class="btn ripple btn-purple-gradient" id='swal-success'>
                                                            <span class="label text-center"></span>
                                                        </div>
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="text-center">{{ @$item->code }}</td>
                                            <td class="text-center"><a href="{{ route('contact.show', $item->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ @$item->name }}</a></td>
                                            <td class="text-center">{{ @$item->mobile }}</td>
                                            <td class="text-center">{{ @$item->contactSource->name }}</td>
                                            <td class="text-center">{{ @$item->area->name }}</td>
                                            <td class="text-center">{{ @$item->subActivity->name }}</td>
                                            <td class="text-center">{{ @$item->employee->name }}</td>
                                            <td class="text-center">
                                                @if (@$item->is_active == 1)
                                                <label class="badge badge-light-success">
                                                    {{ app()->getLocale() == 'ar' ? 'مفعل' : 'Active' }}
                                                </label>
                                                @else
                                                <label class="badge badge-light-danger">
                                                    {{ app()->getLocale() == 'ar' ? 'غير مفعل' : 'Not Active' }}
                                                </label>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ @$item->createdBy->name }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    {{ trans('main.Actions') }}
                                                    <i class="ki-outline ki-down fs-5 ms-1"></i>
                                                </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    @can('تعديل جهات الإتصال')
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#relateEmployee_modal_{{ @$item->id }}">{{ trans('main.Relate Employee') }}</a>
                                                        </div>
                                                    @endcan
                                                    @can('عرض جهات الإتصال')
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('contact.show', $item->id) }}" class="menu-link px-3">{{ trans('main.Show') }}</a>
                                                        </div>
                                                    @endcan
                                                    @can('تعديل جهات الإتصال')
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('contact.edit', $item->id) }}" class="menu-link px-3">{{ trans('main.Edit') }}</a>
                                                        </div>
                                                    @endcan
                                                    @if($item->is_active == 1)
                                                        @can('تغيير حالات تنشيط جهات الإتصال')
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#active_modal_{{ @$item->id }}">{{ trans('main.DisActivate') }}</a>
                                                            </div>
                                                        @endcan
                                                    @else
                                                        @can('تغيير حالات تنشيط جهات الإتصال')
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#active_modal_{{ @$item->id }}">{{ trans('main.Activate') }}</a>
                                                            </div>
                                                        @endcan
                                                    @endif
                                                    @if($item->is_trashed == 1)
                                                        @can('أرشفة جهات الإتصال')
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#trash_modal_{{ @$item->id }}">{{ trans('main.Restore') }}</a>
                                                            </div>
                                                        @endcan
                                                    @else
                                                        @can('أرشفة جهات الإتصال')
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#trash_modal_{{ @$item->id }}">{{ trans('main.Trash') }}</a>
                                                            </div>
                                                        @endcan
                                                    @endif
                                                    @can('حذف جهات الإتصال')
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ @$item->id }}">{{ trans('main.Delete') }}</a>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                            @include('dashboard.contact.relateEmployeeModal')
                                            @include('dashboard.contact.activeModal')
                                            @include('dashboard.contact.trashModal')
                                            @include('dashboard.contact.deleteModal')
                                            @include('dashboard.contact.deleteSelectedModal')
                                            @include('dashboard.contact.trashSelectedModal')
                                            @include('dashboard.contact.activateSelectedModal')
                                            @include('dashboard.contact.relateSelectedModal')
                                            @include('dashboard.contact.messageSelectedModal')
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

                            {{ @$data->links() }}
                            @include('dashboard.contact.filterModal')
                        </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="city_id"]').on('change', function() {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    url: "{{URL::to('admin/areaByCityId')}}/" + city_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="area_id"]').empty();
                        $('select[name="area_id"]').append('<option class="form-control" value=""> الكل</option>');
                        $.each(data, function(key, value) {
                            $('select[name="area_id"]').append('<option class="form-control" value="' + value["id"] + '">' + value["name"] + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="area_id"]').empty();
                console.log('not work')
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="industry_id"]').on('change', function() {
            var industry_id = $(this).val();
            if (industry_id) {
                $.ajax({
                    url: "{{URL::to('admin/majorByIndustryId')}}/" + industry_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="major_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="major_id"]').append('<option class="form-control" value="' + value["id"] + '">' + value["name"] + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="major_id"]').empty();
                console.log('not work')
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="branch_id"]').on('change', function() {
            var activity_id = $(this).val();
            if (activity_id) {
                $.ajax({
                    url: "{{URL::to('admin/employeeByBranchId')}}/" + activity_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="employee_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="employee_id"]').append('<option class="form-control" value="' + value["id"] + '">' + value["name"] + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="employee_id"]').empty();
                console.log('not work')
            }
        });
    });
</script>

<script type="text/javascript">
    //import excel
    $('#fetch-columns').click(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData();
        console.log('yes');
        formData.append('excel_file', $('#excel-file')[0].files[0]);
        formData.append('_token', csrfToken);
        $.ajax({
            url: 'admin/import/fetch.excel/columns',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                // Display fetched Excel columns to the user
                $('#excel-columns-container').html(data);

                // Add column mapping dropdowns here
                // (user selects which contact field corresponds to each Excel column)
                console.log('yes');
            },
            error: function(xhr, status, error) {
                // Handle errors (e.g., display error messages)
                var errors = JSON.parse(xhr.responseText);
                console.log(errors);
                console.log('no');
            }
        });
    });
</script>
@endsection
