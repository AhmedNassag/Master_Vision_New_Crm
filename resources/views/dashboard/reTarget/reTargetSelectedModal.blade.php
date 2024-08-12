<!--begin::Add Modal-->
<div class="modal fade" id="reTarget_selected" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('reTarget.selected') }}" method="POST" id="delete_multi_category_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Retarget') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- activity_id -->
                    <div id="retarget_activity_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="retarget_activity_id" id="retarget_activity_id" data-control="select2" data-dropdown-parent="#retarget_activity_id" class="form-select form-select-solid" required>
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                            @foreach($activities as $activity)
                                <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- interest_id -->
                    <div id="retarget_interest_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="retarget_interest_id" id="retarget_interest_id" data-control="select2" data-dropdown-parent="#retarget_interest_id" class="form-select form-select-solid" required>
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>

                    <input class="text" type="hidden" name="old_activity_id" value = "{{ $activity_id }}">
                    <input class="text" type="hidden" name="old_interest_id" value = "{{ $interest_id }}">
                    <!-- reTarget_selected_id -->
                    <input class="text" type="hidden" id="reTarget_selected_id" name="reTarget_selected_id" value=''>
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
<!--end::Add Modal-->
