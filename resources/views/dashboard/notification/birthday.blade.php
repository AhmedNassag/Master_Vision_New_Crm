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
                            <li class="breadcrumb-item text-muted">{{ trans('main.todayBirthdays') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
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

                            <!-- pagination -->
                            <form method="GET" action="{{ url('admin/birthday') }}">
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

                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="example1">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.8906px;">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="box1 form-check-input" name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" oninput="showBtnDeleteSelected3()">
                                            </div>
                                        </th>
                                        <th class="text-center">{{ trans('main.Code') }}</th>
                                        <th class="text-center">{{ trans('main.Name') }}</th>
                                        <th class="text-center">{{ trans('main.Mobile') }}</th>
                                        <th class="text-center">{{ trans('main.City') }}</th>
                                        <th class="text-center">{{ trans('main.Area') }}</th>
                                        <th class="text-center">{{ trans('main.CreatedBy') }}</th>
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
                                        <td class="text-center">{{ @$item->city->name }}</td>
                                        <td class="text-center">{{ @$item->area->name }}</td>
                                        <td class="text-center">{{ @$item->createdBy->name }}</td>
                                    </tr>
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
