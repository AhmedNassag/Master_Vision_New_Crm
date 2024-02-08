<!--begin::Modal-->
<div class="modal fade" id="call_modal_{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('meeting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.Call') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- interests_ids[] -->
                    <div id="interests_ids" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="interests_ids[]" multiple data-control="select2" data-dropdown-parent="#interests_ids" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $subActivities = \App\Models\SubActivity::get(['id','name']); ?>
                            @foreach($subActivities as $subActivity)
                                <option value="{{ $subActivity->id }}">{{ $subActivity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- type -->
                    <div id="type" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Contact With') }}</span>
                        </label>
                        <select name="type" data-control="select2" data-dropdown-parent="#type" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="call">{{ trans('main.Call') }}</option>
                            <option value="meeting">{{ trans('main.Meeting') }}</option>
                        </select>
                    </div>
                    <!-- meeting_place -->
                    <div id="meeting_place" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Type') }}</span>
                        </label>
                        <select name="meeting_place" data-control="select2" data-dropdown-parent="#meeting_place" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="in">{{ trans('main.Incoming') }} / {{ trans('main.Inner') }}</option>
                            <option value="out">{{ trans('main.Outcoming') }} / {{ trans('main.Outing') }}</option>
                        </select>
                    </div>
                    <!-- meeting_date -->
                    <div class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Meeting Date') }}</label>
                        <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.Meeting Date') }}" value="{{ old('meeting_date') ?? date('Y-m-d') }}" name="meeting_date" />
                    </div>
                    <!-- revenue -->
                    <div class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Revenue') }}</label>
                        <input type="number" class="form-control form-control-solid" placeholder="{{ trans('main.Revenue') }}" value="{{ old('revenue') }}" name="revenue" />
                    </div>
                    <!-- reply_id -->
                    <div id="reply_id" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Reply') }}</span>
                        </label>
                        <select name="reply_id" data-control="select2" data-dropdown-parent="#reply_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $replies = \App\Models\SavedReply::get(['id','reply']); ?>
                            @foreach($replies as $reply)
                                <option value="{{ $reply->id }}">{{ $reply->reply }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- follow_date -->
                    <div class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Follow Date') }}</label>
                        <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.Follow Date') }}" value="{{ old('follow_date') }}" name="follow_date" />
                    </div>
                    <!-- notes -->
                    <div class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Notes') }}</label>
                        <textarea type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Notes') }}" value="{{ old('notes') }}" name="notes"></textarea>
                    </div>
                    <!-- contact_id -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <input class="form-control form-control-solid" type="hidden" name="contact_id" value="{{ $item->id }}">
                        </div>
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
