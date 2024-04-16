<!--begin::Add Modal-->
<div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('customer.addInvoice') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.Invoice') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- invoice[invoice_number] -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Invoice Number') }}</label>
                            <input type="text" class="form-control form-control-solid" id="invoice_number" placeholder="{{ trans('main.Invoice Number') }}" value="{{ old('invoice[invoice_number]') }}" name="invoice[invoice_number]">
                        </div>
                    </div>
                    <!-- invoice[invoice_date] -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Invoice Date') }}</label>
                            <input type="date" class="form-control form-control-solid" id="invoice_date" placeholder="{{ trans('main.Invoice Date') }}" value="{{ old('invoice[invoice_date]') }}" name="invoice[invoice_date]" />
                        </div>
                    </div>
                    <!-- invoice[total_amount] -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Total Amount') }}</label>
                            <input type="number" step="0.01" class="form-control form-control-solid" id="total_amount" placeholder="{{ trans('main.Total Amount') }}" value="{{ old('invoice[total_amount]') }}" name="invoice[total_amount]" />
                        </div>
                    </div>
                    <!-- invoice[amount_paid] -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Amount Paid') }}</label>
                            <input type="number" step="0.01" class="form-control form-control-solid" id="amount_paid" placeholder="{{ trans('main.Amount Paid') }}" value="{{ old('invoice[amount_paid]') }}" name="invoice[amount_paid]" />
                        </div>
                    </div>
                    <!-- invoice[debt] -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Dept') }}</label>
                            <input type="number" step="0.01" class="form-control form-control-solid" id="debt" placeholder="{{ trans('main.Dept') }}" value="{{ old('invoice[debt]') }}" name="invoice[debt]" readonly />
                        </div>
                    </div>
                    <!-- invoice[activity_id] -->
                    <div id="invoice_activity_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="invoice[activity_id]" id="invoice[activity_id]" data-control="select2" data-dropdown-parent="#invoice_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                            @foreach($activities as $activity)
                                <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- invoice[interest_id] -->
                    <div id="invoice_interest_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="invoice[interest_id]" id="invoice[interest_id]" data-control="select2" data-dropdown-parent="#invoice_interest_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>
                    <!-- status -->
                    <div id="status" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Status') }}</span>
                        </label>
                        <select name="invoice[status]" id="status" data-control="select2" data-dropdown-parent="#status" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="draft">{{ trans('main.Draft') }}</option>
                            <option value="sent">{{ trans('main.Sent') }}</option>
                            <option value="void">{{ trans('main.Void') }}</option>
                            <option selected value="paid">{{ trans('main.Paid') }}</option>
                        </select>
                    </div>
                    <!-- description -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Description') }}</label>
                            <textarea type="text" class="form-control form-control-solid" id="description" placeholder="{{ trans('main.Description') }}" value="{{ old('description') }}" name="invoice[description]"></textarea>
                        </div>
                    </div>
                    <!-- invoice[customer_id] -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="invoice[customer_id]" value="{{ @$item->id }}">
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button type="submit" class="swal2-confirm btn fw-bold btn-primary">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Add Modal-->
