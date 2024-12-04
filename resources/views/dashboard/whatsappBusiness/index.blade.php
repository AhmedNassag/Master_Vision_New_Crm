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
                            <li class="breadcrumb-item text-muted">{{ trans('main.Whatsapp Business Messages Service') }}</li>
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
                                {{-- <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-outline ki-filter fs-2"></i>{{ trans('main.Filter') }}
                                </button> --}}

                                <!--begin::Add-->
                                @if(count($data) == 0)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">{{ trans('main.Add New') }}</button>
                                @endif
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
                                        <th class="text-center">{{ trans('main.whatsapp_business_phone_number_id') }}</th>
                                        <th class="text-center">{{ trans('main.whatsapp_business_acess_token') }}</th>
                                        <th class="text-center min-w-70px">{{ trans('main.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @if(count($data) > 0)
                                            <tr>
                                                <td class="text-center">
                                                    1
                                                </td>
                                                <td class="text-center text-gray-800 text-hover-primary mb-1">{{ @$data['whatsapp_business_phone_number_id'] }}</td>
                                                <td class="text-center">{{ @$data['whatsapp_business_access_token'] }}</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        {{ trans('main.Actions') }}
                                                        <i class="ki-outline ki-down fs-5 ms-1"></i>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit_modal_1">{{ trans('main.Edit') }}</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"  data-bs-toggle="modal" data-bs-target="#delete_modal_1">{{ trans('main.Delete') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('dashboard.whatsappBusiness.editModal')
                                            @include('dashboard.whatsappBusiness.deleteModal')
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
                    </div>
                </div>

                @include('dashboard.whatsappBusiness.addModal')

            </div>
        </div>
    </div>
</div>
<!--end:::Main-->
@endsection
