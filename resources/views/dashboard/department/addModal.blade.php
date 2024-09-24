<!--begin::Add Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data" id="add-form">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.Department') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ old('name') }}" name="name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button type="submit" class="btn btn-primary" id="submitButton" onclick="disableButton()">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Add Modal-->



{{--
<script>
    function disableButton() {
        document.getElementById('submitButton').disabled = true;
        document.getElementById('add-form').submit();
    }
</script>
--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select the form by ID
        var form = document.getElementById('add-form');

        // Listen for the form's submit event
        form.addEventListener('submit', function (event) {
            // Select the button inside the form
            var submitButton = document.getElementById('submitButton');

            // Disable the button to prevent multiple clicks
            submitButton.disabled = true;

            // Optional: Change button text or add loading indicator
            submitButton.innerHTML = '<span class="indicator-label">جاري الحفظ</span>';
        });
    });
</script>
