<!--begin::Add Modal-->
<div class="modal fade" id="delete_modal_{{ @$item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('contactCategory.destroy', 'test') }}" method="POST" enctype="multipart/form-data" id="delete-form-{{ @$item->id }}">
                {{ method_field('Delete') }}
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Delete') }} {{ trans('main.ContactCategory') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <h5 class="text-center">{{ trans('main.Are You Sure Of Deleting..??') }}</h5>
                </div>
                <!-- id -->
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="{{ @$item->id }}">
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button type="submit" class="swal2-confirm btn fw-bold btn-danger" id="submitDeleteButton-{{ @$item->id }}">
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
        var form = document.getElementById('delete-form-{{ @$item->id }}');

        // Listen for the form's submit event
        form.addEventListener('submit', function (event) {
            // Select the button inside the form
            var submitButton = document.getElementById('submitDeleteButton-{{ @$item->id }}');

            // Disable the button to prevent multiple clicks
            submitButton.disabled = true;

            // Optional: Change button text or add loading indicator
            submitButton.innerHTML = '<span class="indicator-label">جاري الحذف</span>';
        });
    });
</script>
