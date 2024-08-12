@extends('customer-portal.layout')



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

<!-- Page Wrapper -->
<div class="page-wrapper p-5">
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header pb-5">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{ trans('main.Support Tickets') }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('customer.tickets') }}" class="text-muted text-hover-primary">{{ trans('main.Support Tickets') }}</a>
                    </li>
                    <li class="breadcrumb-item text-muted">{{ trans('main.Add') }} {{ trans('main.Support Ticket') }}</li>
                </ul>
            </div>
            <div class="col-auto">
                <a href="{{ route('customer.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                    {{ trans('main.Back') }}
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <form class="form" action="{{ route('customer.tickets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body py-10 px-lg-17">
            <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                <div class="row">
                    <!-- interest_id -->
                    <div id="interest_id" class="col-md-6 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Project') }}</span>
                        </label>
                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            @foreach ($sub_activities as $sub_activity)
                                <option value="{{ @$sub_activity->id }}">{{ @$sub_activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- ticket_type -->
                    <div class="col-md-6 fv-row" id="ticket_type">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Type') }}</span>
                        </label>
                        <select name="ticket_type" data-control="select2" data-dropdown-parent="#ticket_type" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="Technical Issue">{{ trans('main.Technical Issue') }}</option>
                            <option value="Inquiry">{{ trans('main.Inquiry') }}</option>
                            <option value="Request">{{ trans('main.Request') }}</option>
                        </select>
                    </div>
                    <!-- notes -->
                    <div class="col-md-12 fv-row mt-3">
                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Description') }}</label>
                        <textarea id="replyTextNode" type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Enter Your Message Here') }}" value="{{ old('notes') }}" name="notes" rows="5"></textarea>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <div class="modal-footer flex-center">
            <button type="submit" class="btn btn-primary">
                <span class="indicator-label">{{ trans('main.Confirm') }}</span>
            </button>
        </div>
    </form>

</div>
<!-- content container-fluid closed -->
</div>
<!-- page-wrapper closed -->
</div>
<!-- /Main Wrapper -->
@endsection


@push('scripts')
    <script src="{{ asset('dashboard/assets/js/custom/apps/inbox/reply.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/utilities/modals/users-search.js') }}"></script>
@endpush
