<!--begin::Add Modal-->
<div class="modal fade" id="createReminder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('customer.addReminder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.CreateReminders') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- expected_amount -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.ExpectedAmount') }}</label>
                            <input type="number" step="0.01" class="form-control form-control-solid" placeholder="{{ trans('main.ExpectedAmount') }}" value="{{ old('reminder[expected_amount]') }}" id="expected_amount" name="reminder[expected_amount]" />
                        </div>
                    </div>
                    <!-- activity_id -->
                    <div id="add_activity_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="reminder[activity_id]" id="activity_id2" data-control="select2" data-dropdown-parent="#add_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                            @foreach($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- interest_id -->
                    <div id="interest_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="reminder[interest_id]" id="interest_id2" data-control="select2" data-dropdown-parent="#interest_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>
                    <!-- reminder_date -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Reminder Date') }}</label>
                            <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.ReminderDate') }}" value="{{ old('reminder[reminder_date]') }}" name="reminder[reminder_date]" />
                        </div>
                    </div>
                    <!-- id -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="reminder[customer_id]" value="{{ $item->id }}">
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
