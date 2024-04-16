@extends('layouts.app0')



@section('content')
    @php
        $customer = $ticket->customer;
    @endphp

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



    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                    <!--begin::Toolbar wrapper-->
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">{{ trans('main.Show') }} {{ trans('main.Support Ticket') }}</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">{{ trans('main.Support Tickets') }}</li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <a href="{{ route('tickets.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                                {{ trans('main.Back') }}
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <!--begin::Actions-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                            <!--begin::Card-->
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Card body-->
                                <div class="card-body pt-15 px-0">
                                    <div class="d-flex flex-center flex-column mb-5">
                                        <div class="card-toolbar mb-3 row gap-2 container-fluid px-4 mx-auto jtify-content-center">
                                            <!--begin::Call-->
                                            <button type="button" class="btn btn-sm btn-light-primary col-2 text-center mb-3" data-bs-toggle="modal" data-bs-target="#addReplyModal">
                                                {{-- <i class="ki-outline ki-telephone-square fs-3"></i> --}}
                                                {{ trans('main.Reply') }}
                                            </button>
                                            @include('dashboard.tickets.addReplyModal')
                                            <!--end::Call-->
                                            <!--begin::Retarget-->
                                            <button type="button" class="btn btn-sm btn-light-primary col-4 text-center mb-3" data-bs-toggle="modal" data-bs-target="#changeStatusModal">
                                                {{-- <i class="ki-outline ki-user-square fs-3"></i>--}}
                                                    {{ trans('main.Status') }}
                                                </button>
                                                @include('dashboard.tickets.changeStatusModal')
                                                <!--end::Retarget-->
                                            <!--begin::AddParent-->
                                            <button type="button" class="btn btn-sm btn-light-primary col-4 text-center mb-3" data-bs-toggle="modal" data-bs-target="#assignEmployeeModal">
                                            {{-- <i class="ki-outline ki-user-square fs-3"></i>--}}
                                                {{ trans('main.Employee') }}
                                            </button>
                                            @include('dashboard.tickets.assignEmployeeModal')
                                            <!--end::AddParent-->
                                        </div>
                                    </div>
                                    <!--begin::Summary-->
                                    <div class="d-flex flex-center flex-column mb-5">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-100px symbol-circle mb-7">
                                            @if($customer->media)
                                                <img src="{{ asset('attachments/customer/'.@$customer->media->file_name) }}" alt="image" />
                                            @else
                                                <img src="assets/media/avatars/blank.png" alt="image" />
                                            @endif
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <div class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ @$customer->name }}</div>
                                        <!--end::Name-->
                                        <!--begin::Position-->
                                        <div class="fs-5 fw-semibold text-muted mb-3">{{ @$customer->email }}</div>
                                        <div class="fs-5 fw-semibold text-muted mb-6">{{ @$customer->mobile }} - {{ @$customer->mobile2 }}</div>
                                        <!--end::Position-->
                                        <!--begin::Card toolbar-->
                                        @if($customer->customer_id)
                                            <div class="card-toolbar mb-3">
                                                <!--begin::Show-->
                                                <a href="{{ route('customer.show', $customer->id) }}" class="btn btn-sm btn-light-primary">
                                                    {{ trans('main.Show Profile') }}
                                                </a>
                                                <!--end::Show-->
                                            </div>
                                        @endif
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Summary-->
                                    <!--begin::Details toggle-->
                                    <div class="d-flex flex-stack fs-4 py-3">
                                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">
                                            {{ trans('main.Details') }}
                                            <span class="ms-2 rotate-180">
                                                <i class="ki-outline ki-down fs-3"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Details toggle-->
                                    <div class="separator separator-dashed my-3"></div>
                                    <!--begin::Details content-->
                                    <div id="kt_customer_view_details" class="collapse show">
                                        <div class="py-5 fs-6">
                                            <!--begin::Details item-->
                                            @if($customer->employee)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Employee') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->employee->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->gender)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Gender') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->gender }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->name)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Name') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->mobile)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Mobile') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->mobile }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->mobile2)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Mobile2') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->mobile2 }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->activity)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Activity') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->activity->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->subActivity)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.SubActivity') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->subActivity->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->national_id)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.NationalId') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->national_id }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->birth_date)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Birth Date') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->birth_date }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->company_name)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Company Name') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->company_name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->city)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.City') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->city->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->industry)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Industry') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->industry->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->major)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Major') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->major->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if($customer->contactSource)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.ContactSource') }}:</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$customer->contactSource->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--begin::Details item-->
                                        </div>
                                    </div>
                                    <!--end::Details content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Connected Accounts-->
                            @if($customer->notes)
                                <div class="card mb-5 mb-xl-8">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h3 class="fw-bold m-0">{{ trans('main.Notes') }}:</h3>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Notice-->
                                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-design-1 fs-2tx text-primary me-4"></i>
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-semibold">
                                                    <div class="fs-6 text-gray-700">{{ @$customer->notes }}</div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            @endif
                            <!--end::Connected Accounts-->
                        </div>
                        <!--end::Sidebar-->
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ms-lg-15">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">{{ trans('main.Details') }}</a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_overview_events_and_logs_tab">{{ trans('main.Ticket Histoy') }}</a>
                                </li>
                                <!--end:::Tab item-->
                            </ul>
                            <!--end:::Tabs-->
                            <!--begin:::Tab content-->
                            <div class="tab-content" id="myTabContent">
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 pb-5">
                                            <div class="p-md-3">
                                                <div class="row" style="margin: 0">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered col-md-4">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Id') }}</th>
                                                                    <td class="text-start">TK-{{ @$ticket->id }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Customer Name') }}</th>
                                                                    <td class="text-start">{{ @$ticket->customer->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Ticket Type') }}</th>
                                                                    <td class="text-start">{{ trans('main.' . $ticket->ticket_type) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Status') }}</th>
                                                                    <td class="text-start">
                                                                        @if($ticket->status == 'Pending')
                                                                            <label class="badge badge-light-info">
                                                                                {{ trans('main.Pending') }}
                                                                            </label>
                                                                        @elseif($ticket->status == 'Open')
                                                                            <label class="badge badge-light-danger">
                                                                                {{ trans('main.Open') }}
                                                                            </label>
                                                                        @elseif($ticket->status == 'In-Progress')
                                                                            <label class="badge badge-light-warning">
                                                                                {{ trans('main.In-Progress') }}
                                                                            </label>
                                                                        @else
                                                                            <label class="badge badge-light-success">
                                                                                {{ trans('main.Resolved') }}
                                                                            </label>
                                                                        @endif
                                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#changeStatusModal" class="btn btn-sm btn-edit bg-navy">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <th class="text-start">{{ trans('main.Priority') }}</th>
                                                                    <td class="text-start">{{ @$ticket->priority }}</td>
                                                                </tr> --}}
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Assigned Agent Name') }}</th>
                                                                    <td class="text-start">{{ @$ticket->agent->name ?? '' }}
                                                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#assignEmployeeModal" class="btn btn-sm btn-edit  bg-navy">
                                                                            <i class="fa fa-share"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Activity') }}</th>
                                                                    <td class="text-start">{{ @$ticket->activity->name ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Interest') }}</th>
                                                                    <td class="text-start">{{ @$ticket->subActivity->name ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Created At') }}</th>
                                                                    <td class="text-start">{{ @$ticket->created_at }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Updated At') }}</th>
                                                                    <td class="text-start">{{ @$ticket->updated_at }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-start">{{ trans('main.Description') }}</th>
                                                                    <td class="text-start">{{ @$ticket->description }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 pb-5">
                                            <ul class="timeline timeline-inverse">
                                                <li>
                                                    <div class="timeline-item flex-column">
                                                        <span class="time">
                                                            <i class="fa fa-clock-o"></i>
                                                            {{ @$ticket->created_at->format('Y-m-d H:i:s') }}
                                                        </span>
                                                        <br>
                                                        <div class="timeline-body">
                                                            {{ @$ticket->description }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr>
                                                @foreach ($ticket->logs()->orderBy('id','desc')->get() as $log)
                                                    <li>
                                                        <div class="timeline-item flex-column">
                                                            <span class="time">
                                                                <i class="fa fa-clock-o"></i>
                                                                {{ @$log->created_at->format('Y-m-d H:i:s') }}
                                                            </span>
                                                            <br>
                                                            <h3 class="timeline-header">
                                                                @if($log->user_type == 'agent')
                                                                    {{ trans('main.Support Team') }}:
                                                                    <small>{{ @$log->user->name }}</small>
                                                                @else
                                                                    {{ trans('main.Customer') }}:
                                                                    <small>{{ @$customer->name }}</small>
                                                                @endif
                                                            </h3>
                                                            <br>
                                                            <div class="timeline-body">
                                                                {!! $log->comment !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                            </div>
                            <!--end:::Tab content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>Powered by
                    <a href="https://www.mv-is.com" target="_blank" class="text-gray-800 text-hover-primary">Master Vision</a> &
                    <a href="https://www.wedo-eg.com" target="_blank" class="text-gray-800 text-hover-primary">WE DO Digital Solutions</a>
                </div>
                <!--end::Copyright-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end:::Main-->

@endsection



@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="branch_id"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/employeeByBranchId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="employee_id"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="employee_id"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="employee_id"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>
@endsection
