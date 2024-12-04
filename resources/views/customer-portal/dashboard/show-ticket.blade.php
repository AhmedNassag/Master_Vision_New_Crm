@extends('customer-portal.layout')
@section('content')
<style>
    #tickets-table th{
        color: #A1A5B7 !important
    }
    #tickets-table td{
        font-size: 1.075rem !important;
        font-weight: 600!important;
    }
</style>

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

    <!--begin::Card-->
    <div class="card">
        <div class="card-header align-items-center py-5 gap-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">TK-{{ @$ticket->id }} </span>
                <span class="text-muted mt-1 fw-bold fs-7">{{ trans('main.Ticket Details') }}</span>
                <span> <span class="badge badge-light-primary my-1 me-2">
                    {{ trans('main.Status') }}:
                    @if($ticket->status == 'Pending')
                        {{ trans('main.Pending') }}
                    @elseif($ticket->status == 'Open')
                        {{ trans('main.Open') }}
                    @elseif($ticket->status == 'In-Progress')
                        {{ trans('main.In-Progress') }}
                    @else
                        {{ trans('main.Resolved') }}
                    @endif
                </span>
                <span class="badge badge-light-primary my-1 me-2">{{ trans('main.Activity') }}: {{ @$ticket->activity->name ?? "" }}</span>
                <span class="badge badge-light-primary my-1 me-2">{{ trans('main.SubActivity') }}: {{ @$ticket->subActivity->name ?? "" }}</span></span>
            </h3>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('customer.tickets') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                    {{ trans('main.Back') }}
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Title-->

            <!--end::Title-->
            <!--begin::Message accordion-->
            <div data-kt-inbox-message="message_wrapper">
                <!--begin::Message header-->
                <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                    <!--begin::Author-->
                    <div class="d-flex align-items-center">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50 me-4">
                            @if(auth()->user()->media)
                                <img src="{{ asset('attachments/customer/'.auth()->user()->media->file_name) }}" alt="image" />
                            @else
                                <img src="{{ asset('attachments/user/blank.png') }}" alt="image" />
                            @endif
                        </div>
                        <!--end::Avatar-->
                        <div class="pe-5">
                            <!--begin::Author details-->
                            <div class="d-flex align-items-center flex-wrap gap-1">
                                <a class="fw-bolder text-dark text-hover-primary">{{$ticket->customer->name}}</a>
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <circle fill="currentColor" cx="12" cy="12" r="8" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <span class="text-muted fw-bolder">{{ @$ticket->created_at->diffForHumans() }}</span>
                            </div>
                            <!--end::Author details-->
                            <!--begin::Message details-->
                            <div data-kt-inbox-message="details">
                                <span class="text-muted fw-bold">{{ trans('main.To Support Team') }}</span>
                            </div>
                            <!--end::Message details-->

                        </div>
                    </div>
                    <!--end::Author-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <!--begin::Date-->
                        <span class="fw-bold text-muted text-end me-3">{{ @$ticket->created_at->format('Y-m-d H:i:s') }}</span>
                        <!--end::Date-->

                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Message header-->
                <!--begin::Message content-->
                <div class="collapse fade show" data-kt-inbox-message="message">
                    <div class="py-5">
                        {!!$ticket->description!!}
                    </div>
                </div>
                <!--end::Message content-->

                <!--begin::Preview media-->
                @if($ticket->media)
                    <div class="fw-bold mw-450px">
                        <img src="{{ asset('attachments/ticket/'.@$ticket->media->file_name) }}" alt="image" width="100%" height="100%"/>
                    </div>
                @endif
                <!--end::Preview media-->
            </div>
            <!--end::Message accordion-->
            @foreach ($ticket->logs()->orderBy('id','desc')->get() as $log)
                <div class="separator my-6"></div>
                <!--begin::Message accordion-->
                <div data-kt-inbox-message="message_wrapper">
                    <!--begin::Message header-->
                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50 me-4">
                                <img alt="Logo" src="{{ asset('attachments/user/blank.png') }}" />
                            </div>
                            <!--end::Avatar-->
                            <div class="pe-5">
                                <!--begin::Author details-->
                                <div class="d-flex align-items-center flex-wrap gap-1">
                                    <a class="fw-bolder text-dark text-hover-primary">
                                        @if($log->user_type =='agent')
                                            {{ trans('main.Support Team') }}
                                        @else
                                            {{ trans('main.You') }}
                                        @endif
                                    </a>
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                    <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <circle fill="currentColor" cx="12" cy="12" r="8" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="text-muted fw-bolder">{{ @$log->created_at->diffForHumans() }}</span>
                                </div>
                                <!--end::Author details-->

                                <!--begin::Preview message-->
                                <div class="fw-bold mw-450px" data-kt-inbox-message="preview">
                                    {!! $log->comment !!}
                                </div>
                                <!--end::Preview message-->

                                <!--begin::Preview media-->
                                @if($log->media)
                                    <div class="fw-bold mw-450px">
                                        <img src="{{ asset('attachments/communicationLog/'.@$log->media->file_name) }}" alt="image" width="100%" height="100%"/>
                                    </div>
                                @endif
                                <!--end::Preview media-->
                            </div>
                        </div>
                        <!--end::Author-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <!--begin::Date-->
                            <span class="fw-bold text-muted text-end me-3">{{ @$log->created_at->format('Y-m-d H:i:s') }}</span>
                            <!--end::Date-->

                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Message header-->

                </div>
                <!--end::Message accordion-->
                <div class="separator my-6"></div>
            @endforeach
            <!--begin::Form-->
            <style>
                .ql-editor.ql-blank:before
                {
                    left: auto!important;
                    right: 0!important;
                }
            </style>
            <form id="kt_inbox_reply_form" class="rounded border mt-10" action="{{ route('customer.ticket.reply',$ticket->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!--begin::Body-->
                <div class="d-block">
                    <!--begin::notes-->
                    <textarea id="replyTextNode" type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Enter Your Message Here') }}" value="{{ old('notes') }}" name="notes" rows="5"></textarea>
                    <!--end::notes-->

                    <!-- begin::photo -->
                    <div id="photo" class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Photo') }}</label>
                        <input type="file" class="form-control form-control-solid" value="{{ old('photo') }}" name="photo" />
                    </div>
                    <!--end::photo-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center me-3">
                        <!--begin::Send-->
                        <div class="btn-group me-4">
                            <!--begin::Submit-->
                            <button class="btn btn-primary fs-bold px-6" type="sub" id="submitButton">
                                <span class="indicator-label">{{ trans('main.Send') }}</span>
                            </button>
                            <!--end::Submit-->
                        </div>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>



    {{--
    <script>
        function disableButton() {
            document.getElementById('submitButton').disabled = true;
            document.getElementById('add-form').submit();
        }
    </script>
    --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select the form by ID
            var form = document.getElementById('kt_inbox_reply_form');

            // Listen for the form's submit event
            form.addEventListener('submit', function (event) {
                // Select the button inside the form
                var submitButton = document.getElementById('submitButton');

                // Disable the button to prevent multiple clicks
                submitButton.disabled = true;

                // Optional: Change button text or add loading indicator
                submitButton.innerHTML = '<span class="indicator-label">جاري الإرسال</span>';
            });
        });
    </script>
@endsection


@push('scripts')
    <script src="{{ asset('dashboard/assets/js/custom/apps/inbox/reply.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/widgets.bundle.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/widgets.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/utilities/modals/users-search.js')}}"></script>
@endpush
