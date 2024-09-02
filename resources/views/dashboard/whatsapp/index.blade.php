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
                            <li class="breadcrumb-item text-muted">{{ trans('main.Whatsapp Messages Service') }}</li>
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
                                <!--begin::QR Code-->
                                <a href="https://api.ultramsg.com/instance{{ @$instance->value }}/instance/qr?token={{ @$token->value }}" target="_blank" type="button" class="btn btn-primary">
                                    <i class="ki-outline ki-eye fs-2"></i> {{ trans('main.QR Code') }}
                                </a>
                                <!--end::QR Code-->
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <!-- validationNotify -->
                        @if (@$errors->any())
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
                            <table class="table" id="data_table">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th style="border: 1px solid black;" class="text-center">{{ trans('main.Sent Messages') }}</th>
                                        <td style="border: 1px solid black;" class="text-center text-gray-800 text-hover-primary mb-1">{{ @$statistics['messages_statistics']['sent'] ?? '---' }}</td>
                                    </tr>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th style="border: 1px solid black;" class="text-center">{{ trans('main.Queue Messages') }}</th>
                                        <td style="border: 1px solid black;" class="text-center text-gray-800 text-hover-primary mb-1">{{ @$statistics['messages_statistics']['queue'] ?? '---' }}</td>
                                    </tr>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th style="border: 1px solid black;" class="text-center">{{ trans('main.Unsend Messages') }}</th>
                                        <td style="border: 1px solid black;" class="text-center text-gray-800 text-hover-primary mb-1">{{ @$statistics['messages_statistics']['unsent'] ?? '---' }}</td>
                                    </tr>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th style="border: 1px solid black;" class="text-center">{{ trans('main.Invalid Messages') }}</th>
                                        <td style="border: 1px solid black;" class="text-center text-gray-800 text-hover-primary mb-1">{{ @$statistics['messages_statistics']['invalid'] ?? '---' }}</td>
                                    </tr>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th style="border: 1px solid black;" class="text-center">{{ trans('main.Expired Messages') }}</th>
                                        <td style="border: 1px solid black;" class="text-center text-gray-800 text-hover-primary mb-1">{{ @$statistics['messages_statistics']['expired'] ?? '---' }}</td>
                                    </tr>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th style="border: 1px solid black;" class="text-center">{{ trans('main.Total Messages') }}</th>
                                        <td style="border: 1px solid black;" class="text-center text-gray-800 text-hover-primary mb-1">
                                            {{
                                                @$statistics['messages_statistics']['sent'] +
                                                @$statistics['messages_statistics']['queue'] +
                                                @$statistics['messages_statistics']['unsent'] +
                                                @$statistics['messages_statistics']['invalid'] +
                                                @$statistics['messages_statistics']['expired']
                                            }}
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end:::Main-->
@endsection
