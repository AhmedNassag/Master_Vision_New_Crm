<!--begin::Modal-->
<div class="modal fade" id="changeStatus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('contact.changeStatus') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Change Status') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- status -->
                    <div id="status" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Status') }}</span>
                        </label>
                        <select id="status1" name="status" data-control="select2" data-dropdown-parent="#status" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="contacted">{{ trans('main.Contacted') }}</option>
                            <option value="qualified">{{ trans('main.Qualified') }}</option>
                            <option value="converted">{{ trans('main.Converted') }}</option>
                        </select>
                    </div>
                    <div class="form-group" id="invoice-fields" style="display: none;">
                        <!-- invoice_number -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="invoice_number">{{ trans('main.Invoice Number') }}:</label>
                            <input type="text" class="form-control" id="invoice_number" name="invoice[invoice_number]">
                        </div>
                        <!-- invoice_date -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="invoice_date">{{ trans('main.Invoice Date') }}:</label>
                            <input type="date" class="form-control" id="invoice_date" name="invoice[invoice_date]">
                        </div>
                        <!-- total_amount -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="total_amount">{{ trans('main.Total Amount') }}:</label>
                            <input type="number" step="0.01" class="form-control" id="total_amount" name="invoice[total_amount]">
                        </div>
                        <!-- amount_paid -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="amount_paid">{{ trans('main.Amount Paid') }}:</label>
                            <input type="number" step="0.01" class="form-control" id="amount_paid" name="invoice[amount_paid]" value="0">
                        </div>
                        <!-- debt (Calculated field) -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="debt">{{ trans('main.Dept') }}:</label>
                            <input type="number" step="0.01" class="form-control" id="debt" name="invoice[debt]" readonly>
                        </div>
                        <!-- description -->
                        <div class="form-group">
                            <label class="fs-5 fw-semibold mb-2" for="description">{{ trans('main.Description') }}:</label>
                            <textarea class="form-control" id="description" name="invoice[description]" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('main.Activity') }}:</label>
                            <input class="form-control disabled" disabled value="{{ $item->activity->name ?? '' }}" readonly>
                        </div>
                        <!-- sub_activity -->
                        <div class="form-group">
                            <label>{{ trans('main.SubActivity') }}:</label>
                            <input class="form-control disabled" disabled value="{{ $item->subActivity->name ?? '' }}" readonly>
                        </div>

                        <!-- invoice[activity_id] -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <input class="form-control form-control-solid" type="hidden" name="invoice[activity_id]" value="{{ $item->activity_id }}" />
                            </div>
                        </div>
                        <!-- invoice[interest_id] -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <input class="form-control form-control-solid" type="hidden" name="invoice[interest_id]" value="{{ $item->interest_id }}" />
                            </div>
                        </div>
                        <!-- contact_id -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <input class="form-control form-control-solid" type="hidden" name="contact_id" value="{{ $item->id }}">
                            </div>
                        </div>
                        <!-- Status -->
                        <div id="status" class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">{{ trans('main.Status') }}</label>
                            <select id="status" name="invoice[status]" data-control="select2" data-dropdown-parent="#status" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                <option value="draft">{{ trans('main.Draft') }}</option>
                                <option value="sent">{{ trans('main.Sent') }}</option>
                                <option selected value="paid">{{ trans('main.Paid') }}</option>
                                <option value="void">{{ trans('main.Void') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->
