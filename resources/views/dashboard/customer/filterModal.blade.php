<!--begin::Modal-->
<div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('customer.index') }}" method="get">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Filter') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- name -->
                    <div class="col-md-12 fv-row">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Name') }}</label>
                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ old('name') }}" name="name" />
                    </div>
                    <!-- mobile -->
                    <div class="col-md-12 fv-row">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Mobile') }}</label>
                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ old('mobile') }}" name="mobile" />
                    </div>
                    <!-- birth_date -->
                    <div class="col-md-12 fv-row">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Birth Date') }}</label>
                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.birth_date') }}" value="{{ old('birth_date') }}" name="birth_date" />
                    </div>
                    <!-- national_id -->
                    <div class="col-md-12 fv-row">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.NationalId') }}</label>
                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.national_id') }}" value="{{ old('national_id') }}" name="national_id" />
                    </div>
                    <!-- gender -->
                    <div id="gender_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Gender') }}</span>
                        </label>
                        <select name="gender" data-control="select2" data-dropdown-parent="#gender_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="Male">{{ trans('main.Male') }}</option>
                            <option value="Female">{{ trans('main.Female') }}</option>
                        </select>
                    </div>
                    <!-- religion -->
                    <div class="col-md-12 fv-row" id="religion_filter">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Religion') }}</span>
                        </label>
                        <select name="religion" data-control="select2" data-dropdown-parent="#religion_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="muslim">{{ trans('main.Muslim') }}</option>
                            <option value="christian">{{ trans('main.Christian') }}</option>
                            <option value="other">{{ trans('main.Other') }}</option>
                        </select>
                    </div>
                    <!-- marital_status -->
                    <div class="col-md-12 fv-row" id="marital_status_filter">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Marital Status') }}</span>
                        </label>
                        <select name="marital_status" data-control="select2" data-dropdown-parent="#marital_status_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="single">{{ trans('main.Single') }}</option>
                            <option value="married">{{ trans('main.Married') }}</option>
                            <option value="absolute">{{ trans('main.Absolute') }}</option>
                            <option value="widower">{{ trans('main.Widower') }}</option>
                            <option value="other">{{ trans('main.Other') }}</option>
                        </select>
                    </div>
                    <!-- activity_id -->
                    <div id="activity_id_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
                            @foreach($activities as $activity)
                            <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- interest_id -->
                    <div id="interest_id_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}</option>

                        </select>
                    </div>
                    <!-- branch_id -->
                    <div id="branch_id_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.Branch') }}</span>
                        </label>
                        <select name="branch_id" data-control="select2" data-dropdown-parent="#branch_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $branches = \App\Models\Branch::get(['id', 'name']); ?>
                            @foreach($branches as $branch)
                            <option value="{{ @$branch->id }}">{{ @$branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- city_id -->
                    <div id="city_id_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.City') }}</span>
                        </label>
                        <select name="city_id" data-control="select2" data-dropdown-parent="#city_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $cities = \App\Models\City::get(['id', 'name']); ?>
                            @foreach($cities as $city)
                            <option value="{{ @$city->id }}">{{ @$city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- area_id -->
                    <div id="area_id_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Area') }}</span>
                        </label>
                        <select name="area_id" data-control="select2" data-dropdown-parent="#area_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>
                    <!-- tag_id -->
                    <div id="tag_id_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.Tag') }}</span>
                        </label>
                        <select name="tag_id" data-control="select2" data-dropdown-parent="#tag_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $tags = \App\Models\Tag::get(['id', 'name']); ?>
                            @foreach($tags as $tag)
                            <option value="{{ @$tag->id }}">{{ @$tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- from_date -->
                    <div class="col-md-12 fv-row">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.From Date') }}</label>
                        <input type="datetime-local" class="form-control form-control-solid" placeholder="{{ trans('main.From Date') }}" value="{{ old('from_date') }}" name="from_date" />
                    </div>
                    <!-- to_date -->
                    <div class="col-md-12 fv-row">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.To Date') }}</label>
                        <input type="datetime-local" class="form-control form-control-solid" placeholder="{{ trans('main.To Date') }}" value="{{ old('to_date') }}" name="to_date" />
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
