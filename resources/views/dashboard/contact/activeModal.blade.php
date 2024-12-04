<!--begin::Add Modal-->
<div class="modal fade" id="active_modal_{{ @$item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('contact.changeActive', 'test') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Change Active') }} {{ trans('main.Contact') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <h5 class="text-center">{{ trans('main.Are You Sure Of Change Active..??') }}</h5>
                </div>
                <!-- id -->
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="{{ @$item->id }}">
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
