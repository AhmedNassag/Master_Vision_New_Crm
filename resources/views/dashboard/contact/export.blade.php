@extends('layouts.app0')


@section('content')

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

            <!-- successNotify -->
            @if (session()->has('success'))
                <script id="successNotify" style="display: none;">
                    window.onload = function() {
                        notif({
                            msg: "تمت العملية بنجاح",
                            type: "success"
                        })
                    }
                </script>
            @endif

            <!-- errorNotify -->
            @if (session()->has('error'))
                <script id="errorNotify" style="display: none;">
                    window.onload = function() {
                        notif({
                            msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                            type: "error"
                        })
                    }
                </script>
            @endif

            <!-- Page Wrapper -->
            <div class="page-wrapper p-5">
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header pb-5">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">{{ trans('main.Export') }} {{ trans('main.Contacts') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted">{{ trans('main.Export') }} {{ trans('main.Contacts') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('contact.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                                    {{ trans('main.Back') }}
                                    <i class="fas fa-arrow-left"></i>
                                </a>
							</div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <form class="form" action="{{ route('contact.exportData') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body py-10 px-lg-17">
                            <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                                <div class="row">
                                    <!-- from_date -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.From Date') }}</label>
                                        <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.From Date') }}" name="from_date"/>
                                    </div>
                                    <!-- to_date -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.To Date') }}</label>
                                        <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.To Date') }}" name="to_date"/>
                                    </div>
                                    <!-- gender -->
                                    <div class="col-md-6 fv-row" id="gender">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.Gender') }}
                                        </label>
                                        <select name="gender" data-control="select2" data-dropdown-parent="#gender" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <option value="Male">{{ trans('main.Male') }}</option>
                                            <option value="Female">{{ trans('main.Female') }}</option>
                                        </select>
                                    </div>
                                    <!-- name -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ old('name') }}" name="name" />
                                    </div>
                                    <!-- mobile -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Mobile') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ old('mobile') }}" name="mobile" />
                                    </div>
                                    <!-- mobile2 -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Mobile2') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile2') }}" value="{{ old('mobile2') }}" name="mobile2" />
                                    </div>
                                    <!-- national_id -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.NationalId') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.NationalId') }}" value="{{ old('national_id') }}" name="national_id" />
                                    </div>
                                    <!-- email -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Email') }}</label>
                                        <input type="email" class="form-control form-control-solid" placeholder="{{ trans('main.Email') }}" value="{{ old('email') }}" name="email" />
                                    </div>
                                    <!-- company_name -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Company Name') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Company Name') }}" value="{{ old('company_name') }}" name="company_name" />
                                    </div>
                                    <!-- campaign_id -->
                                    <div class="col-md-6 fv-row" id="campaign_id">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.Campaign') }}
                                        </label>
                                        <select name="campaign_id" data-control="select2" data-dropdown-parent="#campaign_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            @foreach ($contactSources as $source)
                                                <option value="{{ @$source->id }}">{{ @$source->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- city_id -->
                                    <div id="city_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.City') }}
                                        </label>
                                        <select name="city_id" data-control="select2" data-dropdown-parent="#city_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ @$city->id }}">{{ @$city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- area_id -->
                                    <div id="area_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.Area') }}
                                        </label>
                                        <select name="area_id" data-control="select2" data-dropdown-parent="#area_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ @$area->id }}">{{ @$area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- employee_id -->
                                    <div id="search_employee_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.Employee') }}
                                        </label>
                                        <select name="employee_id" data-control="select2" data-dropdown-parent="#employee_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                        </select>
                                    </div>
                                    <!-- industry_id -->
                                    <div id="industry_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.Industry') }}
                                        </label>
                                        <select name="industry_id" data-control="select2" data-dropdown-parent="#industry_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            @foreach ($industries as $industry)
                                                <option value="{{ @$industry->id }}">{{ @$industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- major_id -->
                                    <div id="major_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.Major') }}
                                        </label>
                                        <select name="major_id" data-control="select2" data-dropdown-parent="#major_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            @foreach ($majors as $major)
                                                <option value="{{ @$major->id }}">{{ @$major->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- job_title_id -->
                                    <div id="job_title_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.JobTitle') }}
                                        </label>
                                        <select name="job_title_id" data-control="select2" data-dropdown-parent="#job_title_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <?php $jobTitles = \App\Models\JobTitle::get(['id','name']); ?>
                                            @foreach($jobTitles as $jobTitle)
                                                <option value="{{ @$jobTitle->id }}">{{ @$jobTitle->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- activity_id -->
                                    <div id="activity_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.Activity') }}
                                        </label>
                                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            @foreach ($activities as $activity)
                                                <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- interest_id -->
                                    <div id="interest_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            {{ trans('main.SubActivity') }}
                                        </label>
                                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>

                                        </select>
                                    </div>
                                    <!-- statusFilter -->
                                    <div class="col-md-12 fv-row">
                                        <input type="hidden" value="" id="statusFilter" name="status" />
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                            </button>
                        </div>
                    </form>

                </div>
                <!-- content container-fluid closed -->
            </div>
            <!-- page-wrapper closed -->
        </div>
        <!-- /Main Wrapper -->
@endsection



@section('js')
    <script>
        function updateSearchEmployeeSelect() {
            var mainSelectValue = $("#searchBranchSelect").val();
            var dependentSelect = $("#searchEmployeeSelect");

            // Clear existing options
            dependentSelect.empty();

            // Fetch options via AJAX
            $.ajax({
                url: "{{ route('employees.ajax') }}", // Replace with the actual URL to fetch options
                method: "GET",
                data: {
                    branch_id: mainSelectValue
                },
                dataType: "json",
                success: function(data) {
                    dependentSelect.append('<option value=""></option>');
                    // Populate options based on the AJAX response
                    $.each(data, function(key, item) {
                        dependentSelect.append("<option value='" + item.id + "'>" + item.name +
                            "</option>");
                    });
                    dependentSelect.select2();
                },
                error: function() {
                    alert("Error fetching options.");
                }
            });
        }
        updateSearchEmployeeSelect();
        $("#searchBranchSelect").on("change", updateSearchEmployeeSelect);
    </script>
