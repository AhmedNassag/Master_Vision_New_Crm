<!--begin::Add Modal-->
<div class="modal fade" id="messageSingleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('message.storeSingleContactMessage') }}" method="POST" id="delete_multi_category_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Send') }} {{ trans('main.Message') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- message -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_message">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Message') }}</span>
                        </label>
                        <textarea type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Message') }}" value="{{ old('message') }}" name="message" required></textarea>
                    </div>
                    <!-- image_url -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_message">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.File') }}</span>
                        </label>
                        <input class="form-control form-control-solid" type="file" name="file">
                    </div>
                    
                    <!-- message_selected_id -->
                    <input class="text" type="hidden" id="message_selected_id" name="message_selected_id" value="{{ @$item->id }}">
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
