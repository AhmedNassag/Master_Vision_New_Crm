@extends('customer-portal.layout')



@section('content')

<div class="my-15">
    <div class="card mb-5  mt-xxl-8">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        @if(auth()->user()->media)
                            <img src="{{ asset('attachments/customer/'.auth()->user()->media->file_name) }}" alt="image" />
                        @else
                            <img src="{{ asset('attachments/user/blank.png') }}" alt="image" />
                        @endif
                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ trans('main.Hello') }}, {{ auth()->user()->name }}</a>
                                <a>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <path
                                                d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                fill="#00A3FF" />
                                            <path class="permanent"
                                                d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{ auth()->user()->jobTitle->name ?? "" }}</a>
                                <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{ auth()->user()->area->name ?? "" }}, {{ auth()->user()->city->name ?? "" }}, مصر</a>
                                <a class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                fill="currentColor" />
                                            <path
                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{ auth()->user()->email ?? "" }}</a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->

                    </div>
                    <!--end::Title-->
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap flex-stack">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <!--begin::Stats-->
                            <div class="row w-100 justify-content-between ">
                                <!--begin::Stat-->
                                <div class="row col-lg-5 justify-content-between ">
                                    <div class="border border-gray-300 border-dashed rounded col-lg-5 py-3 px-4 me-2 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                        rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ @$tickets->count() }}">{{ @$tickets->count() }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">{{ trans('main.Sent Tickets') }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded col-lg-6 py-3 px-4 me-2 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                        rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ @$tickets->where('status','In-Progress')->count() }}">{{ @$tickets->where('status','In-Progress')->count() }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">{{ trans('main.Processed Tickets') }}</div>
                                        <!--end::Label-->
                                    </div>
                                </div>
                                <!--begin::Stat-->
                                <div class="row col-lg-5 justify-content-between">
                                    <div class="border border-gray-300 border-dashed rounded col-lg-6 py-3 px-4 me-2 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                        rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ @$tickets->where('status','Resolved')->count() }}">{{ @$tickets->where('status','Resolved')->count() }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400">{{ trans('main.Expired Tickets') }}</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded col-lg-5 py-3 px-4 me-2 mb-3 bg-light-success text-success">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ auth()->user()->invoices ? auth()->user()->invoices->sum('amount_paid') : 0 }}" data-kt-countup-suffix="ج.م">{{ auth()->user()->invoices ? auth()->user()->invoices->sum('amount_paid') : 0 }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6">{{ trans('main.Paid Amounts') }}</div>
                                        <!--end::Label-->
                                    </div>
                                </div>
                                <!--end::Stat-->
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded col-lg-2 py-3 px-2 me-6 me-lg-2 mb-3 bg-light-danger text-danger">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->

                                        <!--end::Svg Icon-->
                                        <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ auth()->user()->invoices ? auth()->user()->invoices->sum('total_amount') - auth()->user()->invoices->sum('amount_paid') : 0 }}" data-kt-countup-suffix="ج.م">{{ auth()->user()->invoices ? auth()->user()->invoices->sum('total_amount') - auth()->user()->invoices->sum('amount_paid') : 0 }}</div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6">{{ trans('main.Due Amounts') }}</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Wrapper-->

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->

            <hr>

            <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0" style="border-bottom:1px solid;">{{ trans('main.Details') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="d-flex flex-column flex-xl-row">

                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ms-lg-15">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#invoices">{{ trans('main.Invoices') }}</a>
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
                                                                <td class="text-center">{{ @$invoice->activity->name }}</td>
                                                                <td class="text-center">{{ @$invoice->subActivity->name ?? '' }}</td>
                                                                <td class="text-center">{{ ucfirst($invoice->status) }}</td>
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
                                                                <td class="text-center">{{ @$r_customer->name }}</td>
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
                            </div>
                            <!--end:::Tab content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Content container-->
            </div>






        </div>
    </div>
</div>
@endsection
