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
                            <li class="breadcrumb-item text-muted">{{ trans('main.Show') }} {{ trans('main.ActivityLog') }}</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('activityLog.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                            {{ trans('main.Back') }}
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body pt-7">
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
                            <style>
                                table,tr {
                                  border: 1px solid black !important;
                                  border-collapse: collapse !important;
                                }
                                th, td {
                                  padding: 5px !important;
                                  text-align: left !important;
                                }
                            </style>
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">{{ trans('main.Name') }}</th>
                                    <td class="text-start text-gray-800 text-hover-primary mb-1">
                                        <?php
                                            if ($item->causer_type == 'App\Models\User') {
                                                $userName = \App\Models\User::find($item->causer_id)->name;
                                            }
                                            else{
                                                $userName = '----';
                                            }
                                        ?>
                                        {{ @$userName }}
                                    </td>
                                </tr>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">{{ trans('main.Log Name') }}</th>
                                    <td class="text-start text-gray-800 text-hover-primary mb-1">{{ trans('main.'.@$item->log_name) }}</td>
                                </tr>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">{{ trans('main.Event') }}</th>
                                    <td class="text-start text-gray-800 text-hover-primary mb-1">{{ trans('main.'.@$item->event) }}</td>
                                </tr>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">{{ trans('main.Description') }}</th>
                                    <?php
                                        $descriptions=explode(' on ',$item->description);
                                        if(count($descriptions) >= 2)
                                        {
                                            $desc = trans('main.' . $descriptions[0]) . ' ' . trans('main.on') . ' ' . trans('main.' . $descriptions[1]);
                                        }
                                        else
                                        {
                                            $desc = $item->description;
                                        }
                                    ?>
                                    <td class="text-start text-gray-800 text-hover-primary mb-1">{{ @$desc }}</td>
                                </tr>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">{{ trans('main.Date') }}</th>
                                    <td class="text-start text-gray-800 text-hover-primary mb-1">{{ !empty($item->created_at) ? $item->created_at->format('Y-m-d H:i:s') : null }}</td>
                                </tr>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">{{ trans('main.Old Data') }}</th>
                                    <td class="text-start text-gray-800 text-hover-primary mb-1">
                                        @if(isset($item->properties['old']))
                                            @foreach($item->properties['old'] as $key => $value)
                                                <div class="row container">
                                                    <div class="col-3">
                                                        <span class="btn btn-light mb-1">{{ $key }}</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <span class="btn btn-light mb-1">{{ $value }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-start">{{ trans('main.New Data') }}</th>
                                    <td class="text-start text-gray-800 text-hover-primary mb-1">
                                        @if(isset($item->properties['attributes']))
                                            @foreach($item->properties['attributes'] as $key => $value)
                                                <div class="row container">
                                                    <div class="col-3">
                                                        <span class="btn btn-light mb-1">{{ $key }}</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <span class="btn btn-light mb-1">{{ $value }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
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
