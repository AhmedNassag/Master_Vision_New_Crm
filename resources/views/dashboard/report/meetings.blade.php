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
                            <li class="breadcrumb-item text-muted">{{ trans('main.MeetingsReport') }}</li>
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
                        <form id="meeting_search_form" class="form container-fluid" action="{{ route('report.meetingsReport') }}" method="get" enctype="multipart/form-data">
                            @csrf
                            <div class="justify-content-start " data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- from_date -->
                                    <div class="position-relative col-lg-4 col-sm-4 me-md-4">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.From Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="from_date" type="date" value="{{ @$from_date }}">
                                    </div>
                                    <!-- to_date -->
                                    <div class="position-relative col-lg-4 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.To Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="to_date" type="date" value="{{ @$to_date}}">
                                    </div>
                                    <!-- follow_date_from -->
                                    <div class="position-relative col-lg-3 me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Follow Up Date From') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.Follow Up Date From') }}" name="follow_date_from" type="date" value="{{ @$follow_date_from }}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- follow_date_to -->
                                    <div class="col-lg-3 position-relative me-md-5 me-lg-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Follow Up Date To') }}</label>
                                        <input class="form-control form-control-solid ps-6" placeholder="{{ trans('main.Follow Up Date To') }}" name="follow_date_to" type="date" value="{{ @$follow_date_to }}">
                                    </div>
                                    <!-- interests_ids -->
                                    <div id="interests" class="col-lg-4 position-relative me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.SubActivity') }}</span>
                                        </label>
                                        <select name="interests_ids" data-control="select2" data-dropdown-parent="#interests" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $subActivities = App\Models\SubActivity::get(['id','name']); ?>
                                            @foreach( $subActivities as $subActivity )
                                                <option value="{{ @$subActivity->id }}" {{ @$subActivity->id == @$interests_ids ? 'selected' : '' }}>{{ @$subActivity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- contact_source_id -->
                                    <div id="sources" class="position-relative col-lg-4 me-md-2 me-lg-1">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.ContactSource') }}</span>
                                        </label>
                                        <select name="contact_source_id" data-control="select2" data-dropdown-parent="#sources" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php $contactSources = App\Models\ContactSource::get(['id','name']); ?>
                                            @foreach( $contactSources as $contactSource )
                                                <option class="px-0" value="{{ @$contactSource->id }}" {{ @$contactSource->id == @$contact_source_id ? 'selected' : '' }}>{{ @$contactSource->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="row align-items-center mb-10 w-100">
                                    <!-- contact_id -->
                                    <div id="contacts" class="position-relative col-lg-4 me-md-5 me-lg-3">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Contact') }}</span>
                                        </label>
                                        <select name="contact_id" data-control="select2" data-dropdown-parent="#contacts" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.All') }}</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $contacts = App\Models\Contact::get(['id','name']);
                                                }
                                                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                                {
                                                    $contacts = App\Models\Contact::whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                                }
                                                else
                                                {
                                                    $contacts = App\Models\Contact::where('employee_id', auth()->user()->employee->id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach( $contacts as $contact )
                                                <option value="{{ @$contact->id }}" {{ @$contact->id == @$contact_id ? 'selected' : '' }}>{{ @$contact->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- created_by -->
                                    <div id="employee" class="position-relative col-lg-4 me-md-5 me-lg-3">
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
                                    <!-- search submit -->
                                    @can('عرض تقارير المكالمات والزيارات')
                                        <div class="d-flex align-items-center col-lg-2">
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

                        @if(Request::is('admin/report/meetingsReport'))
                            <div id="print" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button>
                                <!-- pagination -->
                                <form method="GET" action="{{ url('admin/report/meetingsReport') }}" class="not_print">
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
                                                <th class="text-center min-w-125px">{{ trans('main.Contact') }}</th>
                                                <th class="text-center">{{ trans('main.Type') }}</th>
                                                <th class="text-center min-w-125px">{{ trans('main.Meeting Place') }}</th>
                                                <th class="text-cente min-w-125px">{{ trans('main.Meeting Date') }}</th>
                                                <th class="text-center min-w-150px">{{ trans('main.Expected Amount') }}</th>
                                                <th class="text-center min-w-150px">{{ trans('main.CreatedBy') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if(@$data->count() > 0)
                                                @foreach (@$data as $key=>$item)
                                                    <tr>
                                                        <td class="text-center">{{ @$key+1 }}</td>
                                                        <td class="text-center">{{ @$item->contact->name }}</td>
                                                        <td class="text-center">@if(@$item->type == 'call') {{ trans('main.Call') }} @else {{ trans('main.Meeting') }}@endif</td>
                                                        <td class="text-center">@if(@$item->meeting_place == 'in') {{ trans('main.In') }} @else {{ trans('main.Out') }}@endif</td>
                                                        <td class="text-center">{{ @$item->meeting_date }}</td>
                                                        <td class="text-center">{{ @$item->revenue }}</td>
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
