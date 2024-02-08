@extends('layouts.app0')
@section('content')

    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-2x m-0">{{ trans('main.Overview') }}</h1>
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">{{ trans('main.Home') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--statistics-->
                    <div class="row gy-5 g-xl-10">

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-xl-10 ">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-abstract-39 fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-primary lh-1 text-center ls-n2">{{ $calls_in_today }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-500">{{ trans('main.Calls Today') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-primary fs-base">
                                        <i class="ki-outline ki-arrow-down fs-5 text-primary ms-n1"></i>
                                        {{ trans('main.Incoming') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-map fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-info text-center lh-1 ls-n2">{{ $calls_out_today }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-500">{{ trans('main.Calls Today') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-info fs-base">
                                        <i class="ki-outline ki-arrow-up fs-5 text-info ms-n1"></i>
                                        {{ trans('main.Outcoming') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-abstract-39 fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-primary lh-1 text-center ls-n2">{{ $meetings_in_today }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-500">{{ trans('main.Meetings Today') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-primary fs-base">
                                        <i class="ki-outline ki-arrow-down fs-5 text-primary ms-n1"></i>
                                        {{ trans('main.Inner') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-map fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-info text-center lh-1 ls-n2">{{ $meetings_out_today }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-500">{{ trans('main.Meetings Today') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-info fs-base">
                                        <i class="ki-outline ki-arrow-up fs-5 text-info ms-n1"></i>
                                        {{ trans('main.Outing') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-5 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-abstract-35 fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-primary text-center lh-1 ls-n2">{{ $calls_in_month }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-500">{{ trans('main.Calls Monthly') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-primary fs-base">
                                        <i class="ki-outline ki-arrow-down fs-5 text-primary ms-n1"></i>
                                        {{ trans('main.Incoming') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-5 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-abstract-26 fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-info text-center lh-1 ls-n2">{{ $calls_out_month }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">{{ trans('main.Calls Monthly') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-info fs-base">
                                        <i class="ki-outline ki-arrow-up fs-5 text-info ms-n1"></i>
                                        {{ trans('main.Outcoming') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-5 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-abstract-35 fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-primary text-center lh-1 ls-n2">{{ $meetings_in_month }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-500">{{ trans('main.Meetings Monthly') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-primary fs-base">
                                        <i class="ki-outline ki-arrow-down fs-5 text-primary ms-n1"></i>
                                        {{ trans('main.Inner') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-xl-3 mb-5 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-center flex-column">
                                    <div class="m-0">
                                        <i class="ki-outline ki-abstract-26 fs-2hx text-gray-600"></i>
                                    </div>
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-info text-center lh-1 ls-n2">{{ $meetings_out_month }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">{{ trans('main.Meetings Monthly') }}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-info fs-base">
                                        <i class="ki-outline ki-arrow-up fs-5 text-info ms-n1"></i>
                                        {{ trans('main.Outing') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--links-->
                    <div class="row g-5 mb-7">
                        <!--Contacts-->
                        <div class="col-xl-3 col-md-3">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                    <div class="mb-7 text-center">
                                        <h2 class="text-gray-900 mb-5 fs-1x fw-bolder">{{ trans('main.Contacts') }}</h2>
                                        <div class="text-center">
                                            <span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">{{ $contacts_count }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('contact.index') }}" class="btn btn-sm btn-primary">{{ trans('main.Details') }}</a>
                                </div>
                            </div>
                        </div>

                        <!--Customers-->
                        <div class="col-xl-3 col-md-3">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                    <div class="mb-7 text-center">
                                        <h2 class="text-gray-900 mb-5 fw-bolder fs-1x">{{ trans('main.Customers') }}</h2>
                                        <div class="text-center">
                                            <span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">{{ $customers }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('contact.index') }}" class="btn btn-sm btn-primary">{{ trans('main.Details') }}</a>
                                </div>
                            </div>
                        </div>

                        <!--TodayReminders-->
                        <div class="col-xl-3 col-md-3">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                    <div class="mb-7 text-center">
                                        <h2 class="text-gray-900 mb-5 fw-bolder fs-1x">{{ trans('main.TodayReminders') }}</h2>
                                        <div class="text-center">
                                            <span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">{{ $todayReminders }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('todayReminders.index') }}" class="btn btn-sm btn-primary">{{ trans('main.Details') }}</a>
                                </div>
                            </div>
                        </div>

                        <!--MonthReminders-->
                        <div class="col-xl-3 col-md-3">
                            <div class="d-flex h-100 align-items-center">
                                <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                    <div class="mb-7 text-center">
                                        <h2 class="text-gray-900 mb-5 fw-bolder fs-1x">{{ trans('main.MonthReminders') }}</h2>
                                        <div class="text-center">
                                            <span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">{{ $monthReminders }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('monthReminders.index') }}" class="btn btn-sm btn-primary">{{ trans('main.Details') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--top-->
                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <!--Top 10 Sales Employee-->
                        <div class="col-xl-8">
                            <div class="card card-flush h-lg-100">
                                <div class="card-header justify-content-start pt-7">
                                    <h3 class="card-title align-items-start flex-column">
                                        <h2 class="card-label fw-bold text-gray-800">{{ trans('main.Top 10 Sales Employee') }}</span>
                                    </h3>
                                </div>
                                <div class="card-body pt-6">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="p-0 pb-3 min-w-175px text-center">{{ trans('main.Employee') }}</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">{{ trans('main.Customers Number') }}</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">{{ trans('main.Amount') }}</th>
                                                    <th class="p-0 pb-3 min-w-150px text-center">{{ trans('main.Branch') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mostSalesEmployees as $employee)
                                                    @php
                                                        $uniqueCustomerCount = \App\Models\Invoice::where('created_by', $employee->id)->distinct('customer_id')->count();
                                                    @endphp
                                                    <tr>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$employee->name }}</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$uniqueCustomerCount }}</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ number_format(@$employee->invoices_sum_total_amount,0) }} ({{ trans('main.EGP') }})</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ $employee->branch ? $employee->branch->name : '---' }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Top 10 Sales Branch-->
                        <div class="col-xl-4">
                            <div class="card card-flush h-lg-100">
                                <div class="card-header pt-5 mb-6">
                                    <h3 class="card-title align-items-start flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <h2 class=" fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ trans('main.Top 10 Sales Branch') }}</h2>
                                        </div>
                                    </h3>
                                </div>
                                <div class="card-body py-0 px-0">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="p-0 pb-3 min-w-175px text-center">{{ trans('main.Branch') }}</th>
                                                    <th class="p-0 pb-3 min-w-150px text-center">{{ trans('main.Total Amount') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mostSalesBranches as $branch)
                                                    <tr>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ $branch->name ? @$branch->name : '---' }}</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ number_format(@$branch->total_sales,0) }} ({{ trans('main.EGP') }})</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <!--Top 5 Contact Sources-->
                        <div class="col-xl-4">
                            <div class="card card-flush h-lg-100">
                            <div class="card-header justify-content-start pt-7">
                                    <h3 class="card-title align-items-start flex-column">
                                        <h2 class="card-label fw-bold text-gray-800">{{ trans('main.Top 5 Contact Sources') }}</h2>
                                    </h3>
                                </div>
                                <div class="card-body pt-6">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="p-0 pb-3 min-w-175px text-center">{{ trans('main.ContactSource') }}</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">{{ trans('main.Number') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sources as $sourcee)
                                                    <tr>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$sourcee->name }}</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$sourcee->contacts_count }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Top 5 Contact Cities-->
                        <div class="col-xl-4">
                            <div class="card card-flush h-lg-100">
                            <div class="card-header justify-content-start pt-7">
                                    <h3 class="card-title align-items-start flex-column">
                                        <h2 class="card-label fw-bold text-gray-800">{{ trans('main.Top 5 Contact Cities') }}</h2>
                                    </h3>
                                </div>
                                <div class="card-body pt-6">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="p-0 pb-3 min-w-175px text-center">{{ trans('main.City') }}</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">{{ trans('main.Number') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cities as $city)
                                                    <tr>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$city->name }}</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$city->contacts_count }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Top 5 Contact Areas-->
                        <div class="col-xl-4">
                            <div class="card card-flush h-lg-100">
                                 <div class="card-header justify-content-start pt-7">
                                    <h3 class="card-title align-items-start flex-column">
                                        <h2 class="card-label fw-bold text-gray-800">{{ trans('main.Top 5 Contact Areas') }}</h2>
                                    </h3>
                                </div>
                                <div class="card-body pt-6">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="p-0 pb-3 min-w-175px text-center">{{ trans('main.Area') }}</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">{{ trans('main.Number') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $area)
                                                    <tr>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$area->name }}</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$area->contacts_count }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Top 5 Interests-->
                        <!-- <div class="col-xl-4">
                            <div class="card card-flush h-lg-100">
                                <div class="card-header pt-7">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-800">{{ trans('main.Top 5 Interests') }}</span>
                                    </h3>
                                </div>
                                <div class="card-body pt-6">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="p-0 pb-3 min-w-175px text-center">{{ trans('main.Interest') }}</th>
                                                    <th class="p-0 pb-3 min-w-100px text-center">{{ trans('main.Number') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($interests as $interest)
                                                    <tr>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$interest->name }}</span>
                                                        </td>
                                                        <td class="text-center pe-0">
                                                            <span class="text-gray-600 fw-bold fs-6">{{ @$interest->meetings_count }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end:::Main-->


@endsection
