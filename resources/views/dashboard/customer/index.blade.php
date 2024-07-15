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
                            <li class="breadcrumb-item text-muted">{{ trans('main.Customers') }}</li>
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
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-425px" data-kt-menu="true" id="kt-toolbar-filter">
                                    <div class="px-7 py-5">
                                        <div class="fs-4 text-gray-900 fw-bold">{{ trans('main.Filter') }}</div>
                                    </div>
                                    <div class="container-scrollable" style="max-height: 500px; overflow-y:auto; max-width:400px">
                                        <div class="separator border-gray-200"></div>
                                        <form action="{{ route('customer.index') }}" method="get">
                                            @csrf
                                            <div class="px-7 py-5 scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                                <!-- name -->
                                                <div class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Name') }}</label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ old('name') }}" name="name" />
                                                </div>
                                                <!-- mobile -->
                                                <div class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Mobile') }}</label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ old('mobile') }}" name="mobile" />
                                                </div>
                                                <!-- birth_date -->
                                                <div class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Birth Date') }}</label>
                                                    <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.Birth Date') }}" value="{{ old('birth_date') }}" name="birth_date" />
                                                </div>
                                                <!-- gender -->
                                                <div class="mb-10" id="gender_filter">
                                                    <label class="form-label fs-5 fw-semibold mb-3">
                                                        <span class="required">{{ trans('main.Gender') }}</span>
                                                    </label>
                                                    <select name="gender" data-control="select2" data-dropdown-parent="#gender_filter" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                        <option value="Male">{{ trans('main.Male') }}</option>
                                                        <option value="Female">{{ trans('main.Female') }}</option>
                                                    </select>
                                                </div>
                                                <!-- activity_id -->
                                                <div id="activity_id_filter" class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">
                                                        <span class="required">{{ trans('main.Activity') }}</span>
                                                    </label>
                                                    <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id_filter" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                        <option value="">{{ trans('main.Select') }}...</option>
                                                        <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
                                                        @foreach($activities as $activity)
                                                        <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- interest_id -->
                                                <div id="interest_id_filter" class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">
                                                        <span class="required">{{ trans('main.SubActivity') }}</span>
                                                    </label>
                                                    <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id_filter" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                        <option value="">{{ trans('main.Select') }}...</option>

                                                    </select>
                                                </div>
                                                <!-- city_id -->
                                                <div id="city_id_filter" class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">
                                                        <span class="required">{{ trans('main.City') }}</span>
                                                    </label>
                                                    <select name="city_id" data-control="select2" data-dropdown-parent="#city_id_filter" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                        <option value="">{{ trans('main.Select') }}...</option>
                                                        <?php $cities = \App\Models\City::get(['id', 'name']); ?>
                                                        @foreach($cities as $city)
                                                        <option value="{{ @$city->id }}">{{ @$city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- area_id -->
                                                <div id="area_id_filter" class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">
                                                        <span class="required">{{ trans('main.Area') }}</span>
                                                    </label>
                                                    <select name="area_id" data-control="select2" data-dropdown-parent="#area_id_filter" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                        <option value="">{{ trans('main.Select') }}...</option>

                                                    </select>
                                                </div>
                                                <!-- from_date -->
                                                <div class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.From Date') }}</label>
                                                    <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.From Date') }}" value="{{ old('from_date') }}" name="from_date" />
                                                </div>
                                                <!-- to_date -->
                                                <div class="mb-10">
                                                    <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.To Date') }}</label>
                                                    <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.To Date') }}" value="{{ old('to_date') }}" name="to_date" />
                                                </div>
                                                <div class="d-flex justify-content-end me-10">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">{{ trans('main.Reset') }}</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">{{ trans('main.Apply') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--begin::Import-->
                                @can('إستيراد العملاء')
                                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#importModal">
                                        <i class="ki-outline ki-exit-down fs-2"></i>{{ trans('main.Import') }}
                                    </button>
                                @endcan
                                @include('dashboard.customer.importModal')
                                <!--end::Import-->
                                <!--begin::Add-->
                                @can('إضافة العملاء')
                                    <a type="button" class="btn btn-primary" href="{{ route('customer.create') }}">{{ trans('main.Add New') }}</a>
                                @endcan
                                <!--end::Add-->
                            </div>
                        </div>
                    </div>
                    <!--multi_selected-->
                    <div class="card-header border-0 pt-lg-6 px-3  ">
                        <div class="card-title"></div>
                        <div class="card-toolbar">
                            <div id="multi_selected_div" class="d-flex justify-content-sm-start  justify-content-lg-end flex-wrap" data-kt-customer-table-toolbar="base" style="display: none">
                                <div class="m-1">
                                    <button id="btn_message_selected" type="button" class="btn btn-sm btn-light-success" data-bs-toggle="modal" data-bs-target="#message_selected" style="display: none">
                                        <i class="ki-duotone ki-whatsapp ">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        {{ trans('main.Send') }} {{ trans('main.Message') }}
                                    </button>
                                </div>
                                <div class="m-1">
                                    @can('حذف العملاء')
                                        <button id="btn_delete_selected" type="button" class="btn btn-sm btn-danger" style="display: none">
                                            {{ trans('main.Delete') }}
                                        </button>
                                    @endcan
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="example1">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.8906px;">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="box1 form-check-input" name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" oninput="showBtnDeleteSelected2()">
                                            </div>
                                        </th>
                                        <th class="text-center">{{ trans('main.Code') }}</th>
                                        <th class="text-center">{{ trans('main.Name') }}</th>
                                        <th class="text-center">{{ trans('main.Mobile') }}</th>
                                        <th class="text-center">{{ trans('main.Mobile2') }}</th>
                                        <th class="text-center">{{ trans('main.City') }}</th>
                                        <th class="text-center">{{ trans('main.Area') }}</th>
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
                                                <input id="delete_selected_input" type="checkbox" value="{{ @$item->id }}" class="box1 form-check-input" oninput="showBtnDeleteSelected2()">
                                            </div>
                                        </td>
                                        <td class="text-center">{{ @$item->code }}</td>
                                        <td class="text-center">
                                            @can('عرض العملاء')
                                                <a href="{{ route('customer.show', $item->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ @$item->name }}</a>
                                            @endcan
                                        </td>
                                        <td class="text-center">{{ @$item->mobile }}</td>
                                        <td class="text-center">{{ @$item->mobile2 }}</td>
                                        <td class="text-center">{{ @$item->city->name }}</td>
                                        <td class="text-center">{{ @$item->area->name }}</td>
                                        <td class="text-center">{{ @$item->createdBy->name }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                {{ trans('main.Actions') }}
                                                <i class="ki-outline ki-down fs-5 ms-1"></i>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    @can('عرض العملاء')
                                                        <a href="{{ route('customer.show', $item->id) }}" class="menu-link px-3">{{ trans('main.Show') }}</a>
                                                    @endcan
                                                </div>
                                                <div class="menu-item px-3">
                                                    @can('تعديل العملاء')
                                                        <a href="{{ route('customer.edit', $item->id) }}" class="menu-link px-3">{{ trans('main.Edit') }}</a>
                                                    @endcan
                                                </div>
                                                <div class="menu-item px-3">
                                                    @can('حذف العملاء')
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ @$item->id }}">{{ trans('main.Delete') }}</a>
                                                    @endcan
                                                </div>
                                                <div class="menu-item px-3">
                                                    @can('تعديل العملاء')
                                                        <a href="#" class="menu-link px-3"  data-bs-toggle="modal" data-bs-target="#makePasswordModal_{{ @$item->id }}">{{ trans('main.Password') }}</a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                        @include('dashboard.customer.deleteModal')
                                        @include('dashboard.customer.makePasswordModal')
                                        @include('dashboard.customer.deleteSelectedModal')
                                        @include('dashboard.customer.messageSelectedModal')
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



@section('js')
<script type="text/javascript">
    //import excel
    $('#fetch-columns').click(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData();
        formData.append('excel_file', $('#excel-file')[0].files[0]);
        formData.append('_token', csrfToken);
        $.ajax({
            url: '{{route("import.fetch.excel.columns")}}?type=customer',
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
@endsection
