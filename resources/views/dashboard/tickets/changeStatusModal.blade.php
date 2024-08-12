<!--begin::Modal-->
<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('ticket.status.change', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Change Status') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- status -->
                    <div id="status" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Status') }}</span>
                        </label>
                        <select id="status1" name="status" data-control="select2" data-dropdown-parent="#status" class="form-select form-select-solid">
                            <option value="Pending" {{ @$ticket->status == 'Pending' ? 'selected' : ''}}>{{ trans('main.Pending') }}</option>
                            <option value="Open" {{ @$ticket->status == 'Open' ? 'selected' : ''}}>{{ trans('main.Open') }}</option>
                            <option value="In-Progress" {{ @$ticket->status == 'In-Progress' ? 'selected' : ''}}>{{ trans('main.In-Progress') }}</option>
                            <option value="Resolved" {{ @$ticket->status == 'Resolved' ? 'selected' : ''}}>{{ trans('main.Resolved') }}</option>
                        </select>
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
<!--end::Modal-->
