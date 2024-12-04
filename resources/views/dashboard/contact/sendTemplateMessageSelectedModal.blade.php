<!--begin::Add Modal-->
<div class="modal fade" id="sendTemplateMessage_selected" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('sendTemplateMessage') }}" method="POST" id="delete_multi_category_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Send') }} {{ trans('main.Message') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- templateName -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_sendTemplateMessage">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Template Name') }}</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Template Name') }}" value="{{ old('templateName') }}" name="templateName" required>
                    </div>
                    <!-- templateLang -->
                    <div id="templateLang" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.templateLang') }}</span>
                        </label>
                        <select name="templateLang" data-control="select2" data-dropdown-parent="#templateLang" class="form-select form-select-solid" required>
                            <option value="ar">{{ trans('main.Ar') }}</option>
                            <option value="en_US">{{ trans('main.En') }}</option>
                        </select>
                    </div>

                    <!-- sendTemplateMessage_selected_id -->
                    <input class="text" type="hidden" id="sendTemplateMessage_selected_id" name="sendTemplateMessage_selected_id" value=''>
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
