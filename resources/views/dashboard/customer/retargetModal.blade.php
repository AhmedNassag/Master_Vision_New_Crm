<!--begin::Add Modal-->
<div class="modal fade" id="retargetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('customer.marketingPostRetargetResults') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.Retarget') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- campaign_id -->
                    <div id="campaign_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Campaign') }}</span>
                        </label>
                        <select name="campaign_id" id="campaign_id" data-control="select2" data-dropdown-parent="#campaign_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $campaigns = \App\Models\Campaign::get(['id','name']); ?>
                            @foreach($campaigns as $campaign)
                                <option value="{{ @$campaign->id }}">{{ @$campaign->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- activity_id -->
                    <div id="new_activity_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="new_activity_id" id="new_activity_id" data-control="select2" data-dropdown-parent="#new_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                            @foreach($activities as $activity)
                                <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- interest_id -->
                    <div id="new_interest_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="new_interest_id" id="new_interest_id" data-control="select2" data-dropdown-parent="#new_interest_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>
                    <!-- reminder[customer_id] -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="reminder[customer_id]" value="{{ @$item->id }}">
                    </div>
                    <!-- id -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="{{ @$item->id }}">
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button id="" type="submit" class="swal2-confirm btn fw-bold btn-primary">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Add Modal-->
