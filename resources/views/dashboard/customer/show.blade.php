@extends('layouts.app0')
@section('content')
    <!-- validationNotify -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
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
                                            @if($item->media)
                                                <img src="{{ asset('attachments/customer/'.@$item->media->file_name) }}" alt="image" />
                                            @else
                                                <img src="assets/media/avatars/blank.png" alt="image" />
                                            @endif
                                        </div>
                                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ @$item->name }}</a>
                                        <div class="fs-5 fw-semibold text-muted mb-6">{{ @$item->mobile }} - {{ @$item->mobile2 }}</div>
                                        <div class="card-toolbar mb-3 row">
                                            <!--begin::Call-->
                                            <button type="button" class="btn btn-sm btn-light-primary col-5 text-center mb-3" data-bs-toggle="modal" data-bs-target="#createReminder">
                                                {{-- <i class="ki-outline ki-telephone-square fs-3"></i> --}}
                                                {{ trans('main.CreateReminder') }}
                                            </button>
                                            @include('dashboard.customer.createReminderModal')
                                            <div class="col-1"></div>
                                            <!--end::Call-->
                                            <!--begin::AddParent-->
                                            <a href="{{ route('customer.addParent', $item->id) }}" type="button" class="btn btn-sm btn-light-primary col-5 text-center mb-3">
                                                {{ trans('main.AddParent') }}
                                            </a>
                                            <div class="col-1"></div>
                                            <!--end::AddParent-->
                                            <!--begin::Relate Employee-->
                                            <button type="button" class="btn btn-sm btn-light-primary col-5 text-center mb-3" data-bs-toggle="modal" data-bs-target="#retargetModal">
                                            {{-- <i class="ki-outline ki-user-square fs-3"></i>--}}
                                                {{ trans('main.Retarget') }}
                                            </button>
                                            @include('dashboard.customer.retargetModal')
                                            <div class="col-1"></div>
                                            <!--end::Relate Employee-->
                                            <!--begin::Edit-->
                                            <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-sm btn-light-primary col-5 text-center mb-3">{{ trans('main.Edit') }}</a>
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
                                                        {{ number_format($item->invoices->sum('amount_paid'), 0) }}
                                                    </div>
                                                    <div class="text-center text-muted fw-bold mb-7">{{ trans('main.Paid Amounts') }}</div>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <div class="text-center">
                                                    <div class="text-center fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        {{ number_format($item->invoices->sum('total_amount') - $item->invoices->sum('amount_paid'), 0) }}
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
                                                        <th class="text-center">{{ trans('main.Activity') }}</th>
                                                        <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                                        <th class="text-center">{{ trans('main.Status') }}</th>
                                                        <th class="text-center">{{ trans('main.Actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    @foreach ($item->invoices as $invoice)
                                                        <tr>
                                                            <td class="text-center">{{ $invoice->invoice_number }}</td>
                                                            <td class="text-center">{{ $invoice->invoice_date }}</td>
                                                            <td class="text-center">{{ number_format($invoice->total_amount, 0) }}</td>
                                                            <td class="text-center">{{ number_format($invoice->amount_paid, 0) }}</td>
                                                            <td class="text-center">{{ number_format($invoice->debt, 0) }}</td>
                                                            <td class="text-center">{{ $invoice->activity->name }}</td>
                                                            <td class="text-center">{{ $invoice->sub_activity->name ?? '' }}</td>
                                                            <td class="text-center">{{ ucfirst($invoice->status) }}</td>
                                                            <td class="text-center">
                                                                <a type="button" class="btn btn-sm btn-edit btn-info btn-block" href="{{ route('customer.edit.invoice',$invoice->id) }}">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
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
                                            <input type="hidden" value="{{ $item->id }}" name="customer_id" />
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
                                                                    <a href="{{ $file->file_path }}" target="_blank" class="">
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
                                                                    {{ $attachment->attachment_name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <img src="{{ asset('uploads/thumbnails/' . basename($attachment->attachment)) }}" alt="Thumbnail" id="thumbnail" style="max-width: 100px; max-height: 100px;">
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="{{ asset('uploads/' . basename($attachment->attachment)) }}" download="{{ $item->name }} - {{ $attachment->attachment_name }}" class="btn btn-primary">{{ trans('main.Download') }}</a>
                                                                </td>
                                                                <td class="text-center">

                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-danger" onclick="removeAttachment(this, {{ $attachment->id }})">{{ trans('main.Remove') }}</button>
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
                                                                    <span class="{{ $contact->status_info['class'] }}">{{ $contact->status_info['status'] }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="#" class="load-content" data-url="{{ route('contact.show', $contact->id) }}">{{ $contact->name }}</a>
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
                                                            <th class="text-center">{{ trans('main.Customer') }}</th>
                                                            <th class="text-center">{{ trans('main.Invoice') }}</th>
                                                            <th class="text-center">{{ trans('main.RecorderReminders') }}</th>
                                                            <th class="text-center">{{ trans('main.Status') }}</th>
                                                            <th class="text-center">{{ trans('main.SubActivity') }}</th>
                                                            <th class="text-center">{{ trans('main.Activity') }}</th>
                                                            <th class="text-center">{{ trans('main.ExpectedAmount') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-600">
                                                        @foreach ($item->reminders as $reorderReminder)
                                                            <tr>
                                                                <td class="text-center">{{ @$reorderReminder->id }}</td>
                                                                <td class="text-center">{{ @$reorderReminder->customer->name }} </td>
                                                                <td class="text-center">{{ @$reorderReminder->invoice->id }}</td>
                                                                <?php $reminderDate = new DateTime($reorderReminder->reminder_date); ?>
                                                                <td class="text-center">{{ @$reminderDate->format('Y-m-d') }}</td>
                                                                <td class="text-center">{{ @$reorderReminder->is_completed ? 'تم التذكير' : 'جديد' }}</td>
                                                                <td class="text-center">{{ @$reorderReminder->interest->name }}</td>
                                                                <td class="text-center">{{ @$reorderReminder->activity->name }}</td>
                                                                <td class="text-center">{{ @$reorderReminder->expected_amount }}</td>
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
                                                                    <a href="{{ route('customer.show', $r_customer->id) }}">{{ $r_customer->name }}</a>
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
                                                        {{ number_format($item->calculateSumOfPoints(), 0) }}
                                                    </div>
                                                    <div class="text-center text-muted fw-bold mb-7">{{ trans('main.Points') }}</div>
                                                    <p>{{ trans('main.Valid Points') }}</p>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <div class="text-center">
                                                    <div class="text-center fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        {{ number_format($item->calculatePointsValue(), 0) }}
                                                    </div>
                                                    <div class="text-center text-muted fw-bold mb-7">{{ trans('main.EGP') }}</div>
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
                            </div>
                            <!--end:::Tab content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                    <!--begin::Modals-->
                    <!--begin::Modal - Add Payment-->
                    <div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Add a Payment Record</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div id="kt_modal_add_payment_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                        <i class="ki-outline ki-cross fs-1"></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_add_payment_form" class="form" action="#">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">Invoice Number</span>
                                                <span class="ms-2" data-bs-toggle="tooltip" title="The invoice number must be unique.">
                                                    <i class="ki-outline ki-information fs-7"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="invoice" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Status</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid fw-bold" name="status" data-control="select2" data-placeholder="{{ trans('main.Select') }}" data-hide-search="true">
                                                <option></option>
                                                <option value="0">Approved</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Rejected</option>
                                                <option value="3">In progress</option>
                                                <option value="4">Completed</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Invoice Amount</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="amount" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">
                                                <span class="required">Additional Information</span>
                                                <span class="ms-2" data-bs-toggle="tooltip" title="Information such as description of invoice or product purchased.">
                                                    <i class="ki-outline ki-information fs-7"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control-solid rounded-3" name="additional_info"></textarea>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_add_payment_cancel" class="btn btn-light me-3">Discard</button>
                                            <button type="submit" id="kt_modal_add_payment_submit" class="btn btn-primary">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Card-->
                    <!--begin::Modal - Adjust Balance-->
                    <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Adjust Balance</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                        <i class="ki-outline ki-cross fs-1"></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Balance preview-->
                                    <div class="d-flex text-center mb-9">
                                        <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                            <div class="fs-6 fw-semibold mb-2 text-muted">Current Balance</div>
                                            <div class="fs-2 fw-bold" kt-modal-adjust-balance="current_balance">US$ 32,487.57</div>
                                        </div>
                                        <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                            <div class="fs-6 fw-semibold mb-2 text-muted">New Balance
                                            <span class="ms-2" data-bs-toggle="tooltip" title="Enter an amount to preview the new balance.">
                                                <i class="ki-outline ki-information fs-7"></i>
                                            </span></div>
                                            <div class="fs-2 fw-bold" kt-modal-adjust-balance="new_balance">--</div>
                                        </div>
                                    </div>
                                    <!--end::Balance preview-->
                                    <!--begin::Form-->
                                    <form id="kt_modal_adjust_balance_form" class="form" action="#">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Adjustment type</label>
                                            <!--end::Label-->
                                            <!--begin::Dropdown-->
                                            <select class="form-select form-select-solid fw-bold" name="adjustment" aria-label="{{ trans('main.Select') }}" data-control="select2" data-dropdown-parent="#kt_modal_adjust_balance" data-placeholder="{{ trans('main.Select') }}" data-hide-search="true">
                                                <option></option>
                                                <option value="1">Credit</option>
                                                <option value="2">Debit</option>
                                            </select>
                                            <!--end::Dropdown-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="kt_modal_inputmask" type="text" class="form-control form-control-solid" name="amount" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">Add adjustment note</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Disclaimer-->
                                        <div class="fs-7 text-muted mb-15">Please be aware that all manual balance changes will be audited by the financial team every fortnight. Please maintain your invoices and receipts until then. Thank you.</div>
                                        <!--end::Disclaimer-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" id="kt_modal_adjust_balance_cancel" class="btn btn-light me-3">Discard</button>
                                            <button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Card-->
                    <!--begin::Modal - New Address-->
                    <div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Form-->
                                <form class="form" action="#" id="kt_modal_update_customer_form">
                                    <!--begin::Modal header-->
                                    <div class="modal-header" id="kt_modal_update_customer_header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Update Customer</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div id="kt_modal_update_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                            <i class="ki-outline ki-cross fs-1"></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body py-10 px-lg-17">
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header" data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">
                                            <!--begin::Notice-->
                                            <!--begin::Notice-->
                                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                                <!--begin::Icon-->
                                                <i class="ki-outline ki-information fs-2tx text-primary me-4"></i>
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <!--begin::Content-->
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Updating customer details will receive a privacy audit. For more info, please read our
                                                        <a href="#">Privacy Policy</a></div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                            <!--end::Notice-->
                                            <!--begin::User toggle-->
                                            <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_customer_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_customer_user_info">User Information
                                            <span class="ms-2 rotate-180">
                                                <i class="ki-outline ki-down fs-3"></i>
                                            </span></div>
                                            <!--end::User toggle-->
                                            <!--begin::User form-->
                                            <div id="kt_modal_update_customer_user_info" class="collapse show">
                                                <!--begin::Input group-->
                                                <div class="mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">
                                                        <span>Update Avatar</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg.">
                                                            <i class="ki-outline ki-information fs-7"></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Image input wrapper-->
                                                    <div class="mt-1">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Edit-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="avatar_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit-->
                                                            <!--begin::Cancel-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                                <i class="ki-outline ki-cross fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                                <i class="ki-outline ki-cross fs-2"></i>
                                                            </span>
                                                            <!--end::Remove-->
                                                        </div>
                                                        <!--end::Image input-->
                                                    </div>
                                                    <!--end::Image input wrapper-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="Sean Bean" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">
                                                        <span>Email</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Email address must be active">
                                                            <i class="ki-outline ki-information fs-7"></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="email" class="form-control form-control-solid" placeholder="" name="email" value="sean@dellito.com" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-15">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Description</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::User form-->
                                            <!--begin::Billing toggle-->
                                            <div class="fw-bold fs-3 rotate collapsible collapsed mb-7" data-bs-toggle="collapse" href="#kt_modal_update_customer_billing_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_customer_billing_info">Shipping Information
                                            <span class="ms-2 rotate-180">
                                                <i class="ki-outline ki-down fs-3"></i>
                                            </span></div>
                                            <!--end::Billing toggle-->
                                            <!--begin::Billing form-->
                                            <div id="kt_modal_update_customer_billing_info" class="collapse">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-7 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Address Line 1</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="" name="address1" value="101, Collins Street" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-7 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Address Line 2</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="" name="address2" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-7 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Town</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="" name="city" value="Melbourne" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="row g-9 mb-7">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">State / Province</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input class="form-control form-control-solid" placeholder="" name="state" value="Victoria" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">Post Code</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input class="form-control form-control-solid" placeholder="" name="postcode" value="3000" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-column mb-7 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">
                                                        <span>Country</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                            <i class="ki-outline ki-information fs-7"></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="country" aria-label="{{ trans('main.Select') }}" data-control="select2" data-placeholder="{{ trans('main.Select') }}..." data-dropdown-parent="#kt_modal_update_customer" class="form-select form-select-solid fw-bold">
                                                        <option value="">{{ trans('main.Select') }}...</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Aland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia, Plurinational State of</option>
                                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Côte d'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curaçao</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran, Islamic Republic of</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova, Republic of</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PS">Palestinian Territory, Occupied</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="KR">South Korea</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan, Province of China</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania, United Republic of</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US">United States</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                        <option value="VN">Vietnam</option>
                                                        <option value="VI">Virgin Islands</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Label-->
                                                        <div class="me-5">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold">Use as a billing adderess?</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input" name="billing" type="checkbox" value="1" id="kt_modal_update_customer_billing" checked="checked" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <span class="form-check-label fw-semibold text-muted" for="kt_modal_update_customer_billing">Yes</span>
                                                            <!--end::Label-->
                                                        </label>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--begin::Wrapper-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Billing form-->
                                        </div>
                                        <!--end::Scroll-->
                                    </div>
                                    <!--end::Modal body-->
                                    <!--begin::Modal footer-->
                                    <div class="modal-footer flex-center">
                                        <!--begin::Button-->
                                        <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3">Discard</button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Modal footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                    <!--end::Modal - New Address-->
                    <!--begin::Modal - New Card-->
                    <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2>Add New Card</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <i class="ki-outline ki-cross fs-1"></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_new_card_form" class="form" action="#">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">Name On Card</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                                <!--end::Input-->
                                                <!--begin::Card logos-->
                                                <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                    <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                                    <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                                    <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                                </div>
                                                <!--end::Card logos-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                                            <option></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                                            <option></option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                            <option value="2032">2032</option>
                                                            <option value="2033">2033</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">CVV</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
                                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                        <i class="ki-outline ki-credit-cart fs-2hx"></i>
                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">
                                                <label class="fs-6 fw-semibold form-label">Save Card for further billing?</label>
                                                <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                                <span class="form-check-label fw-semibold text-muted">Save Card</span>
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="text-center pt-15">
                                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Card-->
                    <!--end::Modals-->
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
            formData.append('customer_id', {{ $item->id }});
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
@endsection
