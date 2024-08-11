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

    <!-- Page Wrapper -->
    <div class="page-wrapper p-5">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header pb-5">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ trans('main.Customers') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ trans('main.Edit') }} {{ trans('main.Invoice') }}</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('customer.show', @$invoice->customer_id) }}" type="button" class="btn btn-primary me-2" id="filter_search">
                            {{ trans('main.Back') }}
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form class="form" action="{{ route('customer.update.invoice') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body py-10 px-lg-17">
                    <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                        <div class="row">
                            <!-- invoice_number -->
                            <div class="col-md-6 fv-row mb-6">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Invoice Number') }}</label>
                                <input required type="text" class="form-control form-control-solid" id="invoice_number" name="invoice_number" value="{{ @$invoice->invoice_number }}" required>
                            </div>
                            <!-- invoice_date -->
                            <div class="col-md-6 fv-row mb-6">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Invoice Date') }}</label>
                                <input type="date" required class="form-control form-control-solid" id="invoice_date" name="invoice_date" value="{{ @$invoice->invoice_date }}" required>
                            </div>
                            <!-- total_amount -->
                            <div class="col-md-6 fv-row mb-6">
                                <label class="fs-5 fw-semibold mb-2 required">{{ trans('main.Total Amount') }}</label>
                                <input type="number" required step="0.01" class="form-control form-control-solid" id="total_amount" name="total_amount" value="{{ @$invoice->total_amount }}" required>
                            </div>
                            <!-- amount_paid -->
                            <div class="col-md-6 fv-row mb-6">
                                <label class="fs-5 fw-semibold mb-2 required">{{ trans('main.Amount Paid') }}</label>
                                <input type="number" required step="0.01" class="form-control form-control-solid" id="amount_paid" name="amount_paid"  value="{{ @$invoice->amount_paid }}" required>
                            </div>
                            <!-- debt -->
                            <div class="col-md-6 fv-row mb-6">
                                <label class="fs-5 fw-semibold mb-2 required">{{ trans('main.Dept') }}</label>
                                <input type="number" step="0.01" class="form-control form-control-solid" id="debt"name="debt" value="{{ @$invoice->debt }}" readonly>
                            </div>
                            <!-- activity_id -->
                            <div id="activity_id" class="col-md-6 fv-row mb-6">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">{{ trans('main.Activity') }}</span>
                                </label>
                                <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id" class="form-select form-select-solid" required>
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                                    @foreach($activities as $activity)
                                        <option value="{{ @$activity->id }}" @if($invoice->activity_id == $activity->id ) selected  @endif>{{ @$activity->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- interest_id -->
                            <div id="interest_id" class="col-md-6 fv-row mb-6">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">{{ trans('main.SubActivity') }}</span>
                                </label>
                                <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id" class="form-select form-select-solid" required>
                                    <option value="{{ @$invoice->interest_id  }}">{{ @$invoice->interest ? $invoice->interest->name : " ---- " }} </option>
                                </select>
                            </div>
                            <!-- status -->
                            <div id="status" class="col-md-6 fv-row mb-6">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">{{ trans('main.Status') }}</span>
                                </label>
                                <select name="status" data-control="select2" data-dropdown-parent="#status" class="form-select form-select-solid" required>
                                    <option @if($invoice->status == 'draft' ) selected  @endif value="draft">{{ trans('main.Draft') }}</option>
                                    <option @if($invoice->status == 'sent' ) selected  @endif value="sent">{{ trans('main.Sent') }}</option>
                                    <option @if($invoice->status == 'paid' ) selected  @endif value="paid">{{ trans('main.Paid') }}</option>
                                    <option @if($invoice->status == 'void' ) selected  @endif value="void">{{ trans('main.Void') }}</option>
                                </select>
                            </div>
                            <!-- description -->
                            <div class="col-md-12 fv-row mb-6">
                                <label class="fs-5 fw-semibold mb-2 required">{{ trans('main.Description') }}</label>
                                <textarea class="form-control form-control-solid" id="description" name="description" rows="3" required >{{ @$invoice->description }}</textarea>
                            </div>
                            <!-- id -->
                            <input type="hidden" class="form-control form-control-solid" id="id" name="id" value="{{ @$invoice->id }}">
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
        $(document).ready(function(){
            $('select[name="activity_id"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="interest_id"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="interest_id"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="interest_id"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>


@endsection
