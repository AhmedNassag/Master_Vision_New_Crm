<!--begin::Add Modal-->
<div class="modal fade" id="edit_modal_{{ @$item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('activity.update', 'test') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate id="edit-form-{{ @$item->id }}">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Edit') }} {{ trans('main.Activity') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <!-- name -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ @$item->name, old('name') }}" name="name" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- id -->
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="{{ @$item->id }}">
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button type="submit" class="btn btn-primary" id="submitEditButton-{{ @$item->id }}">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Add Modal-->



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select the form by ID
        var form = document.getElementById('edit-form-{{ @$item->id }}');

        // Listen for the form's submit event
        form.addEventListener('submit', function (event) {
            // Select the button inside the form
            var submitButton = document.getElementById('submitEditButton-{{ @$item->id }}');

            // Disable the button to prevent multiple clicks
            submitButton.disabled = true;

            // Optional: Change button text or add loading indicator
            submitButton.innerHTML = '<span class="indicator-label">جاري التعديل</span>';
        });
    });
</script>
