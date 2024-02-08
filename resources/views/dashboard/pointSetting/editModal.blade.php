<!--begin::Add Modal-->
<div class="modal fade" id="edit_modal_{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('pointSetting.update', 'test') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                {{ method_field('patch') }}
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Edit') }} {{ trans('main.PointSetting') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                        <!-- activity_id -->
                        <div id="add_activity_id" class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">{{ trans('main.Activity') }}</span>
                            </label>
                            <select name="activity_id" data-control="select2" data-dropdown-parent="#add_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                <option value="">{{ trans('main.Select') }}...</option>
                                <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                                @foreach($activities as $activity)
                                    <option value="{{ $activity->id }}" {{ $activity->id == $item->activity_id ? 'selected' : '' }}>{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- sub_activity_id -->
                        <div id="edit_sub_activity_id" class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">{{ trans('main.SubActivity') }}</span>
                            </label>
                            <select name="sub_activity_id" data-control="select2" data-dropdown-parent="#edit_sub_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                <?php $subActivity = \App\Models\SubActivity::where('id',$item->sub_activity_id)->first(); ?>
                                <option value="{{ $subActivity->id }}" {{ $subActivity->id == $item->subActivity_id ? 'selected' : '' }}>{{ $subActivity->name }}</option>
                            </select>
                        </div>

                        <!-- points -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Points') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Points') }}" name="points" value="{{ $item->points, old('points') }}" />
                            </div>
                        </div>

                        <!-- sales_conversion_rate -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.SalesConversionRate') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.SalesConversionRate') }}" name="sales_conversion_rate" value="{{ $item->sales_conversion_rate, old('sales_conversion_rate') }}" />
                            </div>
                        </div>

                        <!-- conversion_rate -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.ConversionRate') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.ConversionRate') }}" name="conversion_rate" value="{{ $item->conversion_rate, old('conversion_rate') }}" />
                            </div>
                        </div>

                        <!-- expiry_days -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.ExpiryDays') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.ExpiryDays') }}" name="expiry_days" value="{{ $item->expiry_days, old('expiry_days') }}" />
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <!-- id -->
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="{{ $item->id }}">
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
