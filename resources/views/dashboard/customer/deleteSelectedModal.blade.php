<!--begin::Add Modal-->
<div class="modal fade" id="delete_selected" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('customer.deleteSelected') }}" method="POST" id="delete_multi_category_form">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Delete Selected') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="form-header">
                        <p>{{ trans('main.Are You Sure Of Multiple Deleting..??') }}</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <!-- id -->
                        <input class="text" type="hidden" id="delete_selected_id" name="delete_selected_id" value=''>
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
<!--end::Add Modal-->