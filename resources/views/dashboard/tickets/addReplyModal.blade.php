<!--begin::Modal-->
<div class="modal fade" id="addReplyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('ticket.reply',$ticket->id) }}" method="POST" enctype="multipart/form-data" id="add-form">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.Reply') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- notes -->
                    <div id="notes" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Reply') }}</span>
                        </label>
                        <textarea id="replyTextNode" type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Enter Your Message Here') }}" value="{{ old('notes') }}" name="notes" rows="5"></textarea>
                    </div>
                    <!-- photo -->
                    <div id="photo" class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Photo') }}</label>
                        <input type="file" class="form-control form-control-solid" value="{{ old('photo') }}" name="photo" />
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button type="submit" class="btn btn-primary" id="submitButton" onclick="disableButton()">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
            <script>
                function disableButton() {
                    document.getElementById('submitButton').disabled = true;
                    document.getElementById('add-form').submit();
                }
            </script>
        </div>
    </div>
</div>
<!--end::Modal-->
