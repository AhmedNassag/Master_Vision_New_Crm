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
                            <li class="breadcrumb-item text-muted">{{ trans('main.Retarget') }}</li>
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
                        <form id="meeting_search_form" class="form container-fluid" action="{{ route('reTarget.get') }}" method="post" enctype="multipart/form-data">
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                @csrf
                                <div class="row w-100 align-items-center mb-10">
                                    <!-- activity_id -->
                                    <div id="activities" class="position-relative col-lg-3 ">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Activity') }}</span>
                                        </label>
                                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activities" data-placeholder="{{ trans('main.Activity') }}..." class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Activity') }}...</option>
                                            <?php $activities = App\Models\Activity::get(['id', 'name']); ?>
                                            @foreach( $activities as $activity )
                                            <option value="{{ @$activity->id }}" {{ @$activity->id == @$activity_id ? 'selected' : '' }}>{{ @$activity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- interest_id -->
                                    <div id="interest_id" class="position-relative col-lg-3 ">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.SubActivity') }}</span>
                                        </label>
                                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>

                                        </select>
                                    </div>
                                    <!-- from_date -->
                                    <div class="position-relative col-lg-3 ">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.From Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="from_date" type="date" value="{{ @$from_date }}">
                                    </div>
                                    <!-- to_date -->
                                    <div class="position-relative col-lg-3 ">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.To Date') }}</label>
                                        <input class="form-control form-control-solid ps-10" placeholder="{{ trans('main.From Date') }}" name="to_date" type="date" value="{{ @$to_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start" data-kt-customer-table-toolbar="base">
                                <div class="d-flex align-items-center mb-10">
                                    <!-- search submit -->
                                    <div class="d-flex align-items-center">
                                        <input class="btn btn-primary mt-10" type="submit" value="{{ trans('main.Search') }}" id="filter" name="filter">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Search -->
                    </div>
                    <!--multi_selected-->
                    <div class="card-header border-0 pt-lg-6 px-3  ">
                        <div class="card-title"></div>
                        <div class="card-toolbar">
                            <div id="multi_selected_div" class="d-flex justify-content-sm-start justify-content-lg-end flex-wrap" data-kt-customer-table-toolbar="base" style="display: none">
                                <div class="m-1">
                                    <button id="btn_reTarget_selected" type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#reTarget_selected" style="display: none">
                                        <i class="ki-outline ki-exit-up fs-2">
                                            {{-- <span class="path1"></span>
                                            <span class="path2"></span> --}}
                                        </i>
                                        {{ trans('main.Retarget') }}
                                    </button>
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

                        @if(Request::is('admin/getReTarget'))
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="example1">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.8906px;">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="box1 form-check-input" name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" oninput="showBtnDeleteSelected4()">
                                            </div>
                                        </th>
                                        <th class="text-center">{{ trans('main.Code') }}</th>
                                        <th class="text-center">{{ trans('main.Name') }}</th>
                                        <th class="text-center">{{ trans('main.Mobile') }}</th>
                                        <th class="text-center">{{ trans('main.Mobile2') }}</th>
                                        <th class="text-center">{{ trans('main.City') }}</th>
                                        <th class="text-center">{{ trans('main.Area') }}</th>
                                        <th class="text-center">{{ trans('main.Activity') }}</th>
                                        <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                        <th class="text-center">{{ trans('main.CreatedBy') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @if($data->count() > 0)
                                    @foreach ($data as $key=>$item)
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input id="delete_selected_input" type="checkbox" value="{{ @$item->id }}" class="box1 form-check-input" oninput="showBtnDeleteSelected4()">
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
                                        <td class="text-center">{{ @$item->activity->name }}</td>
                                        <td class="text-center">{{ @$item->subActivity->name }}</td>
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
                            @include('dashboard.reTarget.reTargetSelectedModal')
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
        $('select[name="retarget_activity_id"]').on('change', function() {
            var activity_id = $(this).val();
            if (activity_id) {
                $.ajax({
                    url: "{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="retarget_interest_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="retarget_interest_id"]').append('<option class="form-control" value="' + value["id"] + '">' + value["name"] + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="retarget_interest_id"]').empty();
                console.log('not work')
            }
        });
    });
</script>
@endsection
