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
                            <li class="breadcrumb-item text-muted">{{ trans('main.todayFollowUps') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
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
                                        <th class="text-center">{{ trans('main.Customer') }}</th>
                                        <th class="text-center min-w-125px fs-3">{{ trans('main.followUps Date') }}</th>
                                        <th class="text-center">{{ trans('main.Notes') }}</th>
                                        <th class="text-center min-w-150px">{{ trans('main.Employee') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @if($data->count() > 0)
                                        @foreach ($data as $key=>$item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ @$key+1 }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('contact.show', @$item->meeting->contact->id) }}" class="text-gray-800 text-hover-primary mb-1">
                                                        {{ @$item->meeting->contact->name }}
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ @$item->follow_date }}</td>
                                                <td class="text-center">{{ @$item->notes }}</td>
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
