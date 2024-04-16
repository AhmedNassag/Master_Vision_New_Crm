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
                            <li class="breadcrumb-item text-muted">{{ trans('main.PointSettings') }}</li>
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
                                    <form action="{{ route('pointSetting.index') }}" method="get">
                                        @csrf
                                        <div class="px-7 py-5">
                                            <div class="mb-10">
                                                <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Name') }}</label>
                                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" name="name" />
                                            </div>
                                            <div class="mb-10">
                                                <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.url') }}</label>
                                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.url') }}" name="url" />
                                            </div>
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">{{ trans('main.Activity') }}</span>
                                                </label>
                                                <select name="activity_id" data-control="select2" data-dropdown-parent="#kt_app_content" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                                                    @foreach($activities as $activity)
                                                        <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-10">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">{{ trans('main.SubActivity') }}</span>
                                                </label>
                                                <select name="sub_activity_id" data-control="select2" data-dropdown-parent="#kt_app_content" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                    <option value="">{{ trans('main.Select') }}...</option>
                                                    <?php $subActivities = \App\Models\SubActivity::get(['id','name']); ?>
                                                    @foreach($subActivities as $subActivity)
                                                        <option value="{{ @$subActivity->id }}">{{ @$subActivity->name }}</option>
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
                                @can('إضافة أنظمة النقاط')
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">{{ trans('main.Add New') }}</button>
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
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ trans('main.Activity') }}</th>
                                            <th class="text-center min-w-125px">{{ trans('main.SubActivity') }}</th>
                                            <th class="text-center min-w-125px">{{ trans('main.Conversion Rate') }}</th>
                                            <th class="text-center min-w-175px">{{ trans('main.Sales Conversion Rate') }}</th>
                                            <th class="text-center">{{ trans('main.Points') }}</th>
                                            <th class="text-center min-w-100px">{{ trans('main.Expiry Days') }}</th>
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
                                                    <td class="text-center">{{ @$item->activity->name }}</td>
                                                    <td class="text-center">{{ @$item->subActivity->name }}</td>
                                                    <td class="text-center">{{ @$item->conversion_rate }}</td>
                                                    <td class="text-center">{{ @$item->sales_conversion_rate }} جنيه/{{ @$item->points }} نقطة</td>
                                                    <td class="text-center">{{ @$item->points }}</td>
                                                    <td class="text-center">{{ @$item->expiry_days }}</td>
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                            {{ trans('main.Actions') }}
                                                            <i class="ki-outline ki-down fs-5 ms-1"></i>
                                                        </a>
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                            @can('تعديل أنظمة النقاط')
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit_modal_{{ @$item->id }}">{{ trans('main.Edit') }}</a>
                                                                </div>
                                                            @endcan
                                                            @can('حذف أنظمة النقاط')
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3"  data-bs-toggle="modal" data-bs-target="#delete_modal_{{ @$item->id }}">{{ trans('main.Delete') }}</a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('dashboard.pointSetting.editModal')
                                                @include('dashboard.pointSetting.deleteModal')
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

                @include('dashboard.pointSetting.addModal')

            </div>
        </div>
    </div>
</div>
<!--end:::Main-->
@endsection



@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="activity_id"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="sub_activity_id"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="sub_activity_id"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="sub_activity_id"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>
@endsection
