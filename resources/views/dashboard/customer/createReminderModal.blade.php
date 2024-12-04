<!--begin::Add Modal-->
<div class="modal fade" id="createReminder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('customer.addReminder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.CreateReminder') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- invoice_id -->
                    <div id="add_invoice_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Invoice Number') }}</span>
                        </label>
                        <select name="reminder[invoice_id]" id="invoice_id" data-control="select2" data-dropdown-parent="#add_invoice_id" class="form-select form-select-solid" required>
                            <option value="">{{ trans('main.Select') }}...</option>
                            @foreach($item->invoices as $invoice)
                                <option value="{{ @$invoice->id }}">{{ @$invoice->invoice_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- expected_amount -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Amount') }}</label>
                            <input type="number" step="0.01" class="form-control form-control-solid" placeholder="{{ trans('main.Amount') }}" value="{{ old('reminder[expected_amount]') ?? 0 }}" id="expected_amount" name="reminder[expected_amount]" required/>
                        </div>
                    </div>
                    <!-- activity_id -->
                    <div id="add_activity_id" class="d-flex flex-column mb-5 fv-row d-none">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="reminder[activity_id]" id="activity_id2" data-control="select2" data-dropdown-parent="#add_activity_id" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                            @foreach($activities as $activity)
                                <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- interest_id -->
                    <div id="interest_id" class="d-flex flex-column mb-5 fv-row d-none">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="reminder[interest_id]" id="interest_id2" data-control="select2" data-dropdown-parent="#interest_id" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>
                    <!-- reminder_date -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Reminder Date') }}</label>
                            <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.ReminderDate') }}" value="{{ old('reminder[reminder_date]') }}" name="reminder[reminder_date]" required/>
                        </div>
                    </div>
                    <!-- reminder_type -->
                    <!--
                    <div id="status" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Type') }}</span>
                        </label>
                        <select name="reminder[reminder_type]" id="reminder_type" data-control="select2" data-dropdown-parent="#reminder_type" class="form-select form-select-solid">
                            <option value="draft">{{ trans('main.Draft') }}</option>
                            <option value="sent">{{ trans('main.Sent') }}</option>
                            <option value="void">{{ trans('main.Void') }}</option>
                            <option selected value="paid">{{ trans('main.Paid') }}</option>
                        </select>
                    </div>
                    -->
                    <!-- notes -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2">{{ trans('main.Notes') }}</label>
                            <textarea type="text" class="form-control form-control-solid" id="notes" placeholder="{{ trans('main.Notes') }}" value="{{ old('notes') }}" name="reminder[notes]">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                    <!-- id -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="reminder[customer_id]" value="{{ @$item->id }}">
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
