<!--begin::Edit Modal-->
<div class="modal fade" id="editReminder_{{ $reorderReminder->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('customer.editReminder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.EditReminder') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- expected_amount -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Amount') }}</label>
                            <input type="number" step="0.01" class="form-control form-control-solid" placeholder="{{ trans('main.Amount') }}" value="{{ $reorderReminder->expected_amount ?? 0 }}" id="expected_amount" name="expected_amount" required/>
                        </div>
                    </div>
                    <!-- reminder_date -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Reminder Date') }}</label>
                            <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.ReminderDate') }}" value="{{ old('reminder.reminder_date', $reorderReminder->reminder_date ? $reorderReminder->reminder_date->format('Y-m-d') : '') }}" name="reminder_date" required/>
                        </div>
                    </div>
                    <!-- notes -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2">{{ trans('main.Notes') }}</label>
                            <textarea type="text" class="form-control form-control-solid" id="notes" placeholder="{{ trans('main.Notes') }}" value="{{ old('notes') }}" name="notes">{{ $reorderReminder->notes }}</textarea>
                        </div>
                    </div>
                    <!-- id -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="{{ @$reorderReminder->id }}">
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
<!--end::Edit Modal-->
