@extends('layouts.app0')
@section('content')
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
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">{{ trans('main.Show') }} {{ trans('main.Customer') }}</h1>
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">{{ trans('main.Customers') }}</li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <a href="{{ route('customer.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                                {{ trans('main.Back') }}
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                            <div class="card mb-5 mb-xl-8">
                                <div class="card-body pt-15">
                                    <div class="d-flex flex-center flex-column mb-5">
                                        <div class="symbol symbol-100px symbol-circle mb-7">
                                            {{-- @if($item->media)
                                                <img src="{{ asset('attachments/customer/'.@$item->media->file_name) }}" alt="image" />
                                            @else --}}
                                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="image" />
                                            {{-- @endif --}}
                                        </div>
                                        <div class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ @$item->name }}</div>
                                        <div class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ @$item->code }}</div>
                                        <div class="fs-5 fw-semibold text-muted mb-6">{{ @$item->mobile }} - {{ @$item->mobile2 }}</div>
                                        <div class="card-toolbar mb-3 row">
                                            <!--begin::Call-->
                                            @can('إضافة تذكيرات العملاء')
                                                <button type="button" class="btn btn-sm btn-light-primary col-5 text-center mb-3" data-bs-toggle="modal" data-bs-target="#createReminder">
                                                    {{ trans('main.CreateReminder') }}
                                                </button>
                                            @endcan
                                            @include('dashboard.customer.createReminderModal')
                                            <div class="col-1"></div>
                                            <!--end::Call-->
                                            <!--begin::AddParent-->
                                            @can('إضافة عملاء مرتبط العملاء')
                                                <a href="{{ route('customer.addParent', $item->id) }}" type="button" class="btn btn-sm btn-light-primary col-5 text-center mb-3">
                                                    {{ trans('main.AddParent') }}
                                                </a>
                                            @endcan
                                            <div class="col-1"></div>
                                            <!--end::AddParent-->
                                            <!--begin::Retarget-->
                                            @can('إضافة إعادة إستهداف العملاء')
                                                <button type="button" class="btn btn-sm btn-light-primary col-5 text-center mb-3" data-bs-toggle="modal" data-bs-target="#retargetModal">
                                                    {{ trans('main.Retarget') }}
                                                </button>
                                            @endcan
                                            @include('dashboard.customer.retargetModal')
                                            <div class="col-1"></div>
                                            <!--end::Retarget-->
                                            <!--begin::Retarget-->
                                            <button type="button" class="btn btn-sm btn-light-primary col-5 text-center mb-3" data-bs-toggle="modal" data-bs-target="#messageSingleModal">
                                                {{ trans('main.Send') }} {{ trans('main.Message') }}
                                            </button>
                                            @include('dashboard.customer.messageSingleModal')
                                            <div class="col-1"></div>
                                            <!--end::Retarget-->
                                            <!--begin::Edit-->
                                            @can('تعديل العملاء')
                                                <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-sm btn-light-primary col-5 text-center mb-3">{{ trans('main.Edit') }}</a>
                                            @endcan
                                            <!--end::Edit-->
                                        </div>
                                    </div>
                                    <div class="d-flex flex-stack fs-4 py-3">
                                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">
                                            {{ trans('main.Details') }}
                                            <span class="ms-2 rotate-180">
                                                <i class="ki-outline ki-down fs-3"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div id="kt_customer_view_details" class="collapse show">
                                        <div class="py-5 fs-6">
                                            @if($item->parent)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Parent') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->parent->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->gender)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Gender') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->gender }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->name)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Name') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->mobile)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Mobile') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->mobile }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->mobile2)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Mobile2') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->mobile2 }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->email)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Email') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->email }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->company_name)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Company Name') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->company_name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->jobTitle)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.JobTitle') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->jobTitle->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->contactSource)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.ContactSource') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->customerSource->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->branch)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Branch') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->branch->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->activity)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Activity') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->activity->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->subActivity)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.SubActivity') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->subActivity->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->national_id)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.NationalId') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->national_id }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->birth_date)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Birth Date') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->birth_date }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->city)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.City') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->city->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->industry)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Industry') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->industry->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($item->major)
                                                <div class="row mb-7">
                                                    <div class="col-5">
                                                        <div class="fw-bold">{{ trans('main.Major') }}</div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-gray-600">{{ @$item->major->name }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($item->notes)
                                <div class="card mb-5 mb-xl-8">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h3 class="fw-bold m-0">{{ trans('main.Notes') }}</h3>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                            <i class="ki-outline ki-design-1 fs-2tx text-primary me-4"></i>
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <div class="fw-semibold">
                                                    <div class="fs-6 text-gray-700">{{ @$item->notes }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($item->custom_attributes)
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

                                                    @if(!empty($item->custom_attributes['program']))
                                                        <div class="fs-6 text-gray-700">
                                                            <strong>البرنامج: </strong> {{ $item->custom_attributes['program'] }}
                                                        </div>
                                                    @endif

                                                    @if(!empty($item->custom_attributes['isomra']))
                                                        <div class="fs-6 text-gray-700">
                                                            <strong>نوع البرنامج: </strong> عمرة
                                                        </div>
                                                        <div class="fs-6 text-gray-700">
                                                            <strong>هل قام بالعمرة من قبل: </strong> {{ $item->custom_attributes['isomra'] }}
                                                        </div>
                                                    @endif

                                                    @if(!empty($item->custom_attributes['ishajj']))
                                                        <div class="fs-6 text-gray-700">
                                                            <strong>نوع البرنامج: </strong> حج
                                                        </div>
                                                        <div class="fs-6 text-gray-700">
                                                            <strong>هل قام بالحج من قبل: </strong> {{ $item->custom_attributes['ishajj'] }}
                                                        </div>
                                                    @endif

                                                    @foreach($item->custom_attributes as $key=>$value)
                                                        <div class="fs-6 text-gray-700">
                                                            <strong>{{ trans('main.' . $key) }}: </strong>
                                                            <br>
                                                            @if(is_array($value))
                                                                {{ json_encode($value) }}
                                                            @else
                                                                {{ $value }}
                                                            @endif
                                                            <hr>
                                                        </div>
                                                    @endforeach
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
                        </div>
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ms-lg-15">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#invoices">{{ trans('main.Invoices') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#attachments">{{ trans('main.Attachments') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#contacts">{{ trans('main.Retarget') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#reminders">{{ trans('main.RecordReminders') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#relatedCustomers">{{ trans('main.RelatedCustomers') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#points">{{ trans('main.PointSettings') }}</a>
                                </li>
                                @if(request()->root() == 'http://new-crm.com' || request()->root() == 'http://new-crm.com/public' || request()->root() == 'https://dev.ourcrm.app' || request()->root() == 'https://dev.ourcrm.app/public' || request()->root() == 'https://nationalegypt.ourcrm.app' || request()->root() == 'https://nationalegypt.ourcrm.app/public')
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#qrcode">{{ trans('main.Qrcode') }}</a>
                                </li>
                                @endif
                                <!--end:::Tab item-->
                            </ul>
                            <!--end:::Tabs-->
                            <!--begin:::Tab content-->
                            <div class="tab-content" id="myTabContent">
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade show active" id="invoices" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <div class="card-header border-0">
                                            <div class="card-title">
                                                <div class="text-center">
                                                    <div class="text-center fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        {{ number_format(@$item->invoices->sum('amount_paid'), 0) }}
                                                    </div>
                                                    <div class="text-center text-muted fw-bold mb-7">{{ trans('main.Paid Amounts') }}</div>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <div class="text-center">
                                                    <div class="text-center fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        {{ number_format(@$item->invoices->sum('total_amount') - @$item->invoices->sum('amount_paid'), 0) }}
                                                    </div>
                                                    <div class="text-center text-muted fw-bold mb-7">{{ trans('main.Remaining Amounts') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 pb-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInvoiceModal">
                                                        <i class="fa fa-plus"></i>{{ trans('main.Add Invoice') }}
                                                    </button>
                                                    @include('dashboard.customer.addInvoiceModal')
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                                <thead>
                                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="text-center">{{ trans('main.Invoice Number') }}</th>
                                                        <th class="text-center">{{ trans('main.Invoice Date') }}</th>
                                                        <th class="text-center">{{ trans('main.Total Amount') }}</th>
                                                        <th class="text-center">{{ trans('main.Amount Paid') }}</th>
                                                        <th class="text-center">{{ trans('main.Dept') }}</th>
                                                        <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                                        <th class="text-center">{{ trans('main.Service') }}</th>
                                                        {{-- <th class="text-center">{{ trans('main.Status') }}</th> --}}
                                                        <th class="text-center">{{ trans('main.Actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    @foreach ($item->invoices as $invoice)
                                                        <tr>
                                                            <td class="text-center">{{ @$invoice->invoice_number }}</td>
                                                            <td class="text-center">{{ @$invoice->invoice_date }}</td>
                                                            <td class="text-center">{{ number_format($invoice->total_amount, 0) }}</td>
                                                            <td class="text-center">{{ number_format($invoice->amount_paid, 0) }}</td>
                                                            <td class="text-center">{{ number_format($invoice->debt, 0) }}</td>
                                                            <td class="text-center">{{ @$invoice->subActivity->name ?? '' }}</td>
                                                            <td class="text-center">{{ @$invoice->service->name }}</td>
                                                            <td class="text-center">
                                                              
                                                                <a href="#" class="btn btn-sm btn-edit btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#cancel_modal_{{ @$invoice->id }}">{{ trans('main.Canceled') }}</a>
                                                                
                                                            </td>
                                                            {{-- <td class="text-center">{{ trans('main.'.ucfirst($invoice->status).'') }}</td> --}}
                                                            <td class="text-center">
                                                                @can('عرض الإيصالات')
                                                                    {{-- @if($invoice->recorderReminders()->count() == 0) --}}
                                                                        <a type="button" class="btn btn-sm btn-edit btn-info btn-block" href="{{ route('invoice.index',$invoice->id) }}" target="_blank">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    {{-- @endif --}}
                                                                @endcan
                                                            </td>
                                                            
                                                        </tr>
                                                        @include('dashboard.customer.cancelinvoice')
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="attachments" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card body-->
                                        <div class="card-body py-0">
                                            <input type="hidden" value="{{ @$item->id }}" name="customer_id" />
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 table-bordered" id="attachmentTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center fs-5">
                                                                {{ trans('main.Attachments') }}
                                                            </th>
                                                            <th class="text-center fs-5">
                                                                {{ trans('main.Actions') }}
                                                            </th>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th>{{ trans('main.Attachment Name') }}</th>
                                                            <th>{{ trans('main.Thumbnail') }}</th>
                                                            <th>{{ trans('main.File') }}</th>
                                                            <th>{{ trans('main.Progress') }}</th>
                                                            <th>{{ trans('main.Actions') }}</th>
                                                        </tr> --}}
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-600">
                                                        <tr >
                                                            <td class="text-center">
                                                                @foreach ($item->files as $file)
                                                                 <div class="d-flex flex-column">
                                                                    <a href="{{ @$file->file_path }}" target="_blank" class="">
                                                                        <img src="{{ asset('attachments/customer/'.@$file->file_name) }}" alt="image" alt="Thumbnail" id="thumbnail" style="max-width: 100px; max-height: 100px;"/>
                                                                    </a>
                                                                    <a type="button" class="btn btn-sm btn-danger my-5 " href="{{ route('customer.deleteAttachment', $file->id) }}">{{ trans('main.Delete') }}</a>
                                                                 </div>
                                                                @endforeach

                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#addAttachmentModal">{{ trans('main.Add Attachment') }}</button>
                                                            </td>
                                                        </tr>
                                                        {{-- @foreach ($item->attachments as $attachment)
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ @$attachment->attachment_name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <img src="{{ asset('uploads/thumbnails/' . basename($attachment->attachment)) }}" alt="Thumbnail" id="thumbnail" style="max-width: 100px; max-height: 100px;">
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="{{ asset('uploads/' . basename($attachment->attachment)) }}" download="{{ @$item->name }} - {{ @$attachment->attachment_name }}" class="btn btn-primary">{{ trans('main.Download') }}</a>
                                                                </td>
                                                                <td class="text-center">

                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-danger" onclick="removeAttachment(this, {{ @$attachment->id }})">{{ trans('main.Remove') }}</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="text-center">
                                                                <input type="text" name="attachment_name[]" class="form-control" placeholder="Enter attachment name">
                                                            </td>
                                                            <td class="text-center">
                                                                <img src="#" alt="Thumbnail" id="thumbnail" style="max-width: 100px; max-height: 100px; display: none;">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="file" name="attachments[]" class="form-control-file" onchange="previewImage(this)">
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" id="progressBar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary" onclick="uploadFile(this)">{{ trans('main.Upload') }}</button>
                                                                <button type="button" class="btn btn-danger" onclick="removeAttachment(this)">{{ trans('main.Remove') }}</button>
                                                            </td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                                {{-- <button type="button" class="btn btn-success" onclick="addRow()">{{ trans('main.Add Attachment') }}</button> --}}
                                                @include('dashboard.customer.addAttachmentModal')
                                                
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="contacts" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card body-->
                                        <div class="card-body py-0">
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                                    <thead>
                                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                            <th class="text-center">{{ trans('main.Status') }}</th>
                                                            <th class="text-center">{{ trans('main.Name') }}</th>
                                                            <th class="text-center">{{ trans('main.Mobile') }}</th>
                                                            <th class="text-center">{{ trans('main.ContactSource') }}</th>
                                                            <th class="text-center">{{ trans('main.City') }}</th>
                                                            <th class="text-center">{{ trans('main.Area') }}</th>
                                                            <th class="text-center">{{ trans('main.Category') }}</th>
                                                            <th class="text-center">{{ trans('main.Activity') }}</th>
                                                            <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                                            <th class="text-center">{{ trans('main.Employee') }}</th>
                                                            <th class="text-center">{{ trans('main.Date') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-600">
                                                        @foreach (App\Models\Contact::where('customer_id', $item->id)->get() as $contact)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <span class="{{ @$contact->status_info['class'] }}">{{ @$contact->status_info['status'] }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('contact.show', $contact->id) }}" class="load-content" data-url="{{ route('contact.show', $contact->id) }}">{{ @$contact->name }}</a>
                                                                </td>
                                                                <td class="text-center">{{ @$contact->mobile }} </td>
                                                                <td class="text-center">{{ @$contact->contactSource->name }}</td>
                                                                <td class="text-center">{{ @$contact->city->name }}</td>
                                                                <td class="text-center">{{ @$contact->area->name }}</td>
                                                                <td class="text-center">{{ @$contact->contactCategory->name }}</td>
                                                                <td class="text-center">{{ @$contact->activity->name }}</td>
                                                                <td class="text-center">{{ @$contact->subActivity->name }}</td>
                                                                <td class="text-center">{{ @$contact->employee->name }}</td>
                                                                <td class="text-center">{{ @$contact->created_at->format('Y-m-d') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="reminders" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card body-->
                                        <div class="card-body py-0">
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                                    <thead>
                                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                            <th class="text-center">{{ trans('main.Id') }}</th>
                                                            <th class="text-center">{{ trans('main.Date') }}</th>
                                                            {{-- <th class="text-center">{{ trans('main.Activity') }}</th> --}}
                                                            <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                                            <th class="text-center">{{ trans('main.Invoice Number') }}</th>
                                                            <th class="text-center">{{ trans('main.Amount') }}</th>
                                                            <th class="text-center">{{ trans('main.Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-600">
                                                        @foreach ($item->reminders as $reorderReminder)
                                                            <tr>
                                                                <td class="text-center">{{ @$reorderReminder->reorder_reminder_number ?? '---' }}</td>
                                                                <?php $reminderDate = new DateTime($reorderReminder->reminder_date); ?>
                                                                <td class="text-center">{{ @$reminderDate->format('Y-m-d') }}</td>
                                                                {{-- <td class="text-center">{{ @$reorderReminder->activity->name }}</td> --}}
                                                                <td class="text-center">{{ @$reorderReminder->interest->name }}</td>
                                                                <td class="text-center">{{ @$reorderReminder->invoice->invoice_number ?? '---' }} </td>
                                                                <td class="text-center">{{ @$reorderReminder->expected_amount }}</td>
                                                                <td class="text-center">
                                                                    <a href="#" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                        {{ trans('main.Actions') }}
                                                                        <i class="ki-outline ki-down fs-5 ms-1"></i>
                                                                    </a>
                                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                        @can('عرض الإيصالات')
                                                                            <div class="menu-item px-3">
                                                                                <a href="{{ route('receipt.index',$reorderReminder->id) }}" target="_blank" class="menu-link px-3">{{ trans('main.Show') }}</a>
                                                                            </div>
                                                                        @endcan
                                                                        @can('تعديل الإيصالات')
                                                                            <div class="menu-item px-3">
                                                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#editReminder_{{ $reorderReminder->id }}">{{ trans('main.Edit') }}</a>
                                                                            </div>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @include('dashboard.customer.editReminderModal')
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="relatedCustomers" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card body-->
                                        <div class="card-body py-0">
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                                    <thead>
                                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                            <th class="text-center">{{ trans('main.Id') }}</th>
                                                            <th class="text-center">{{ trans('main.Customer') }}</th>
                                                            <th class="text-center">{{ trans('main.Date') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-600">
                                                        @foreach ($item->related_customers as $r_customer)
                                                            <tr>
                                                                <td class="text-center">{{ @$r_customer->id }}</td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('customer.show', $r_customer->id) }}">{{ @$r_customer->name }}</a>
                                                                </td>
                                                                <td class="text-center">{{ @$r_customer->created_at->format('Y-m-d') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="points" role="tabpanel">
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <div class="card-header border-0">
                                            <div class="card-title">
                                                <div class="text-center">
                                                    <div class="text-center fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        {{ number_format(@$item->calculateSumOfPoints(), 0) }}
                                                    </div>
                                                    <div class="text-center text-muted fw-bold mb-7">{{ trans('main.Points') }}</div>
                                                    <p>{{ trans('main.Valid Points') }}</p>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <div class="text-center">
                                                    <div class="text-center fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        {{ number_format(@$item->calculatePointsValue(), 0) }}
                                                    </div>
                                                    <div class="text-center text-muted fw-bold mb-7"></div>
                                                    <p>{{ trans('main.Points Value') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--begin::Card body-->
                                        <div class="card-body py-0">
                                            <!--begin::Table wrapper-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                                            <thead>
                                                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                                    <th class="text-center">{{ trans('main.Customer') }}</th>
                                                                    <th class="text-center">{{ trans('main.Activity') }}</th>
                                                                    <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                                                    <th class="text-center">{{ trans('main.Points') }}</th>
                                                                    <th class="text-center">{{ trans('main.ExpiryDays') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fw-semibold text-gray-600">
                                                                @foreach ($item->points as $point)
                                                                    <tr>
                                                                        <td class="text-center">{{ @$point->customer->name }}</td>
                                                                        <td class="text-center">{{ @$point->activity->name }}</td>
                                                                        <td class="text-center">{{ @$point->subActivity->name }}</td>
                                                                        <td class="text-center">{{ @$point->points }}</td>
                                                                        <td class="text-center">{{ @$point->expiry_date }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="qrcode" role="tabpanel">
                                    <!--begin::Card-->
                                    <button class="btn btn-light-primary m-3 not_print" id="print_Button" onclick="printDiv()"><i class="ki-outline bi bi-printer fs-2"></i> {{ trans('main.Print') }} </button>
                                    <div class="card pt-4 mb-6 mb-xl-9" id="print">
                                        <!--begin::Card body-->
                                        <div class="card-body py-0">
                                            <!--begin::Table wrapper-->
                                            <div class="row">
                                                <div class="col-md-12 mt-5">

                                                    <div class="text-center">
                                                        <h1>{{ $item->name }}</h1>
                                                        <h4>{{ $item->mobile }}</h4>
                                                        <div>
                                                            {!! $qrCode !!}
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <!--end::Table wrapper-->
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
        // calculate debt
        var totalAmountInput = $('#total_amount');
        var amountPaidInput = $('#amount_paid');
        var debtInput = $('#debt');
        totalAmountInput.add(amountPaidInput).on('input', function() {
            var totalAmount = parseFloat(totalAmountInput.val()) || 0;
            var amountPaid = parseFloat(amountPaidInput.val()) || 0;
            // Calculate the debt
            var debt = totalAmount - amountPaid;
            // Update the debt input field
            debtInput.val(debt.toFixed(2));
        });
    </script>

    <script type="text/javascript">
        // Function to add a new row to the table
        function addRow() {
            var newRow = `
                <tr>
                    <td><input type="text" name="attachment_name[]" class="form-control" placeholder="Enter attachment name"></td>
                    <td><img src="#" alt="Thumbnail" id="thumbnail" style="max-width: 100px; max-height: 100px; display: none;"></td>
                    <td><input type="file" name="attachments[]" class="form-control-file" onchange="previewImage(this)"></td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" id="progressBar"></div>
                        </div>
                    </td>
                    <td class="buttons-container"><button type="button" class="btn btn-primary" onclick="uploadFile(this)">{{ trans('main.Upload') }}</button><button type="button" class="btn btn-danger" onclick="removeAttachment(this)">{{ trans('main.Remove') }}</button></td>
                </tr>
            `;
            $('#attachmentTable tbody').append(newRow);
        }

        // Function to remove a row from the table
        function removeAttachment(button, attachmentId = '') {
            // Check if the attachment is existing (data-existing="true")
            var isExisting = (attachmentId == '') ? false : true;

            if (isExisting) {
                // Use AJAX to delete the existing attachment
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.attachments.delete.ajax') }}', // Replace with your delete route
                    data: {
                        attachmentId: attachmentId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        $(button).closest('tr').remove();
                    },
                    error: function(xhr, textStatus, errorThrown) {

                        console.error(errorThrown);
                    }
                });
            } else {

                $(button).closest('tr').remove();
            }
        }


        function previewImage(input) {
            var thumbnail = $(input).closest('tr').find('img#thumbnail');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    thumbnail.attr('src', e.target.result);
                    thumbnail.css('display', 'block');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                thumbnail.css('display', 'none');
            }
        }

        function uploadFile(button) {
            var csrfTokenv = $('meta[name="csrf-token"]').attr('content');
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            var fileInput = $(button).closest('tr').find('input[type="file"]');
            var formData = new FormData();
            formData.append('attachment_name', $(button).closest('tr').find('input[name="attachment_name[]"]').val());
            formData.append('attachment_file', fileInput[0].files[0]);
            formData.append('customer_id', {{ @$item->id }});
            formData.append('_token', csrfTokenv);
            // Create a new XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Configure the request
            xhr.open('POST', '{{ route('admin.attachments.store.ajax') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            // Define a progress event handler
            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    $('#progressBar').css('width', percentComplete.toFixed(2) + '%');
                }
            });

            // Define a load event handler
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    swal({
                        icon: 'success',
                        title: 'Successfully Uploaded',
                        type: 'success',
                    });
                    var buttonContainer = $(button).parent('td');
                    buttonContainer.empty();
                    buttonContainer.append(
                        `<button type="button" class="btn btn-danger" onclick="removeAttachment(this,${response.attachment_id})">Remove</button>`
                    );
                } else if (xhr.status === 422) {
                    var response = JSON.parse(xhr.responseText);
                    var errors = response.errors;
                    swal({
                        icon: 'error',
                        title: 'خطأ في الادخال',
                        type: 'error',
                        text: 'Please correct the following errors:',
                        html: formatErrors(errors),
                    });

                } else {
                    swal({
                        icon: 'error',
                        type: 'error',
                        title: 'Validation Error',
                        text: 'Upload failed with status: ' + xhr.status,
                    });
                }
            };

            xhr.onerror = function() {


                swal({
                    icon: 'error',
                    type: 'error',
                    title: 'Validation Error',
                    text: 'Upload failed with an error',
                });
            };

            xhr.send(formData);
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="reminder[activity_id]"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="reminder[interest_id]"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="reminder[interest_id]"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="reminder[interest_id]"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="new_activity_id"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="new_interest_id"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="new_interest_id"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="new_interest_id"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="invoice[activity_id]"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="invoice[interest_id]"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="invoice[interest_id]"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="invoice[interest_id]"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="invoice[interest_id]"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/serviceByInterestId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="invoice[service_id]"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="invoice[service_id]"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="invoice[service_id]"]').empty();
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
