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
                            <li class="breadcrumb-item text-muted">{{ trans('main.ContactsReport') }}</li>
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
                        <form id="meeting_search_form" class="not_print form container-fluid" action="{{ route('report.contactsReport') }}" method="get" enctype="multipart/form-data">
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- from_date -->
                                    <div class="position-relative col-lg-3 me-md-2">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.From Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="from_date" type="date" value="{{ @$from_date }}">
                                    </div>
                                    <!-- to_date -->
                                    <div class="position-relative col-lg-3 me-md-2">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.To Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="to_date" type="date" value="{{ @$to_date}}">
                                    </div>
                                    <!-- city_id -->
                                    <div id="city" class="position-relative col-lg-2 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.City') }}</span>
                                        </label>
                                        <select name="city_id" data-control="select2" data-dropdown-parent="#city" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $cities = App\Models\City::get(['id', 'name']); ?>
                                            @foreach( $cities as $city )
                                            <option value="{{ @$city->id }}" {{ @$city->id == @$city_id ? 'selected' : '' }}>{{ @$city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- area_id -->
                                    <div id="area_id" class="position-relative col-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Area') }}</span>
                                        </label>
                                        <select name="area_id" data-control="select2" data-dropdown-parent="#area_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- contact_source_id -->
                                    <div id="sources" class="position-relative col-lg-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.ContactSource') }}</span>
                                        </label>
                                        <select name="contact_source_id" data-control="select2" data-dropdown-parent="#sources" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $contactSources = App\Models\ContactSource::get(['id', 'name']); ?>
                                            @foreach( $contactSources as $contactSource )
                                            <option value="{{ @$contactSource->id }}" {{ @$contactSource->id == @$contact_source_id ? 'selected' : '' }}>{{ @$contactSource->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- contact_category_id -->
                                    <div id="categories" class="position-relative col-lg-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.ContactCategory') }}</span>
                                        </label>
                                        <select name="contact_category_id" data-control="select2" data-dropdown-parent="#categories" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $contactCategories = App\Models\ContactCategory::get(['id', 'name']); ?>
                                            @foreach( $contactCategories as $contactCategory )
                                            <option value="{{ @$contactCategory->id }}" {{ @$contactCategory->id == @$contact_category_id ? 'selected' : '' }}>{{ @$contactCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- industry_id -->
                                    <div id="industry_id" class="position-relative col-lg-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Industry') }}</span>
                                        </label>
                                        <select name="industry_id" data-control="select2" data-dropdown-parent="#industry_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $industries = \App\Models\Industry::get(['id', 'name']); ?>
                                            @foreach($industries as $industry)
                                            <option value="{{ @$industry->id }}" {{ @$industry->id == @$industry_id ? 'selected' : '' }}>{{ @$industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- major_id -->
                                    <div id="major_id" class="position-relative col-lg-2 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="px-1" >{{ trans('main.Major') }}</span>
                                        </label>
                                        <select name="major_id" data-control="select2" data-dropdown-parent="#major_id" class="form-select form-select-solid">
                                            <option value="" style="font-size: 10px;">{{ trans('main.All') }}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- job_title_id -->
                                    <div id="job_title_id" class="position-relative col-lg-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.JobTitle') }}</span>
                                        </label>
                                        <select name="job_title_id" data-control="select2" data-dropdown-parent="#job_title_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $jobTitles = \App\Models\JobTitle::get(['id', 'name']); ?>
                                            @foreach($jobTitles as $jobTitle)
                                            <option value="{{ @$jobTitle->id }}" {{ @$jobTitle->id == @$job_title_id ? 'selected' : '' }}>{{ @$jobTitle->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- activity_id -->
                                    <div id="activity_id" class="position-relative col-lg-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Activity') }}</span>
                                        </label>
                                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
                                            @foreach($activities as $activity)
                                            <option value="{{ @$activity->id }}" {{ @$activity->id == @$activity_id ? 'selected' : '' }}>{{ @$activity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- created_by -->
                                    <div id="employee" class="position-relative col-lg-3 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Employee') }}</span>
                                        </label>
                                        <select name="created_by" data-control="select2" data-dropdown-parent="#employee" class="form-select form-select-solid">
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
                                    <!-- status -->
                                    <div id="status" class="position-relative col-lg-2 me-md-2">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Status') }}</span>
                                        </label>
                                        <select name="status" data-control="select2" data-dropdown-parent="#status" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <option value="new" {{ @$status == 'new' ? 'selected' : '' }}>{{ trans('main.New') }}</option>
                                            <option value="contacted" {{ @$status == 'contacted' ? 'selected' : '' }}>{{ trans('main.Contacted') }}</option>
                                            <option value="qualified" {{ @$status == 'qualified' ? 'selected' : '' }}>{{ trans('main.Qualified') }}</option>
                                            <option value="converted" {{ @$status == 'converted' ? 'selected' : '' }}>{{ trans('main.Converted') }}</option>
                                        </select>
                                    </div>

                                    @can('عرض تقارير جهات الإتصال')
                                        <div class="d-flex align-items-center col-2">
                                            <input class="not_print btn btn-primary mt-10" type="submit" value="{{ trans('main.Search') }}" id="filter" name="filter">
                                        </div>
                                    @endcan
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10">


                                    <!-- search submit -->

                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10">


                                    <!-- search submit -->

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

                        @if(Request::is('admin/report/contactsReport'))
                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button>
                                @if(request()->query())
                                    <div class="alert">
                                            {{ trans('main.Results Count') }} : <span style="font-weight:bold; color: #000">{{ @$resultCount }}</span>
                                    </div>
                                @endif
                                <!-- pagination -->
                                {{-- <form method="GET" action="{{ url('admin/report/contactsReport') }}" class="not_print">
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
                                    <h1 class="text-center text-decoration-underline">{{ trans('main.ContactsReport') }}</h1>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">#</th>
                                                <th class="text-center">{{ trans('main.Status') }}</th>
                                                <th class="text-center">{{ trans('main.Name') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Mobile') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Mobile2') }}</th>
                                                <th class="text-center" >{{ trans('main.City') }}</th>
                                                <th class="text-center">{{ trans('main.Area') }}</th>
                                                <th class="text-center">{{ trans('main.Activity') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.CreatedBy') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if(@$data->count() > 0)
                                                @foreach (@$data as $key=>$item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ @$key+1 }}
                                                        </td>
                                                        <td class="text-center">
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
                                                        </td>
                                                        <td class="text-center">{{ @$item->name }}</td>
                                                        <td class="text-center">{{ @$item->mobile }}</td>
                                                        <td class="text-center">{{ @$item->mobile2 }}</td>
                                                        <td class="text-center">{{ @$item->city->name }}</td>
                                                        <td class="text-center">{{ @$item->area->name }}</td>
                                                        <td class="text-center">{{ @$item->activity->name }}</td>
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
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        @endif
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
                        $('select[name="major_id"]').append('<option class="form-control" value="">' + "{{ __('main.All') }}" + '</option>');
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
