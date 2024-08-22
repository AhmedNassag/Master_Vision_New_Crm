<!--begin::Add Modal-->
<div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('contact.index') }}" method="get">
                <div class="modal-header">
                    <h2>{{ trans('main.Filter') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- name -->
                    <div class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Name') }}</label>
                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ @$name }}" name="name" />
                    </div>
                    <!-- mobile -->
                    <div class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.Mobile') }}</label>
                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ @$mobile }}" name="mobile" />
                    </div>
                    <!-- gender -->
                    <div class="mb-7" id="gender_filter">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.Gender') }}</span>
                        </label>
                        <select name="gender" data-control="select2" data-dropdown-parent="#gender_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="Male" {{ @$gender == 'Male' ? 'selected' : '' }}>{{ trans('main.Male') }}</option>
                            <option value="Female" {{ @$gender == 'Female' ? 'selected' : '' }}>{{ trans('main.Female') }}</option>
                        </select>
                    </div>
                    <!-- religion -->
                    <div class="mb-7" id="religion_filter">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Religion') }}</span>
                        </label>
                        <select name="religion" data-control="select2" data-dropdown-parent="#religion_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="muslim" {{ @$religion == 'muslim' ? 'selected' : '' }}>{{ trans('main.Muslim') }}</option>
                            <option value="christian" {{ @$religion == 'christian' ? 'selected' : '' }}>{{ trans('main.Christian') }}</option>
                            <option value="other" {{ @$religion == 'other' ? 'selected' : '' }}>{{ trans('main.Other') }}</option>
                        </select>
                    </div>
                    <!-- marital_status -->
                    <div class="mb-7" id="marital_status_filter">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Marital Status') }}</span>
                        </label>
                        <select name="marital_status" data-control="select2" data-dropdown-parent="#marital_status_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="single" {{ @$marital_status == 'single' ? 'selected' : '' }}>{{ trans('main.Single') }}</option>
                            <option value="married" {{ @$marital_status == 'married' ? 'selected' : '' }}>{{ trans('main.Married') }}</option>
                            <option value="absolute" {{ @$marital_status == 'absolute' ? 'selected' : '' }}>{{ trans('main.Absolute') }}</option>
                            <option value="widower" {{ @$marital_status == 'widower' ? 'selected' : '' }}>{{ trans('main.Widower') }}</option>
                            <option value="other" {{ @$marital_status == 'other' ? 'selected' : '' }}>{{ trans('main.Other') }}</option>
                        </select>
                    </div>
                    <!-- activity_id -->
                    <div id="activity_id_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
                            @foreach($activities as $activity)
                            <option value="{{ @$activity->id }}" {{ @$activity->id == @$activity_id ? 'selected' : '' }}>{{ @$activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- interest_id -->
                    <div id="interest_id_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

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
                            <option value="{{ @$branch->id }}" {{ @$branch->id == @$branch_id ? 'selected' : '' }}>{{ @$branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- created_by -->
                    <div id="created_by_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.CreatedBy') }}</span>
                        </label>
                        <select name="created_by" data-control="select2" data-dropdown-parent="#created_by_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.All') }}</option>
                            <?php
                                if(Auth::user()->roles_name[0] == "Admin")
                                {
                                    $employees = \App\Models\Employee::hidden()->get(['id','name']);
                                }
                                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                {
                                    $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                }
                                else
                                {
                                    $employees = \App\Models\Employee::hidden()->where('id', auth()->user()->employee->id)->get(['id','name']);
                                }
                            ?>
                            @foreach( $employees as $employee )
                                <option value="{{ @$employee->id }}" {{ @$employee->id == @$created_by ? 'selected' : '' }}>{{ @$employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- employee_id -->
                    <div id="employee_id_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.Related Employee') }}</span>
                        </label>
                        <select name="employee_id" data-control="select2" data-dropdown-parent="#employee_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.All') }}</option>
                            <?php
                                if(Auth::user()->roles_name[0] == "Admin")
                                {
                                    $employees = \App\Models\Employee::hidden()->get(['id','name']);
                                }
                                else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
                                {
                                    $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                }
                                else
                                {
                                    $employees = \App\Models\Employee::hidden()->where('id', auth()->user()->employee->id)->get(['id','name']);
                                }
                            ?>
                            @foreach( $employees as $employee )
                                <option value="{{ @$employee->id }}" {{ @$employee->id == @$employee_id ? 'selected' : '' }}>{{ @$employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- nationality_id -->
                    <div id="nationality_id_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Nationality') }}</span>
                        </label>
                        <select name="nationality_id" data-control="select2" data-dropdown-parent="#nationality_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $nationalities = \App\Models\Nationality::get(['id', 'name']); ?>
                            @foreach($nationalities as $nationality)
                            <option value="{{ @$nationality->id }}" {{ @$nationality->id == @$nationality_id ? 'selected' : '' }}>{{ @$nationality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- city_id -->
                    <div id="city_id_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.City') }}</span>
                        </label>
                        <select name="city_id" data-control="select2" data-dropdown-parent="#city_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $cities = \App\Models\City::get(['id', 'name']); ?>
                            @foreach($cities as $city)
                            <option value="{{ @$city->id }}" {{ @$city->id == @$city_id ? 'selected' : '' }}>{{ @$city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- area_id -->
                    <div id="area_id_filter" class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">
                            <span>{{ trans('main.Area') }}</span>
                        </label>
                        <select name="area_id" data-control="select2" data-dropdown-parent="#area_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>
                    <!-- reply_id -->
                    <div id="reply_id_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Reply') }}</span>
                        </label>
                        <select name="reply_id" data-control="select2" data-dropdown-parent="#reply_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $replies = \App\Models\SavedReply::get(['id', 'reply']); ?>
                            @foreach($replies as $reply)
                            <option value="{{ @$reply->id }}" {{ @$reply->id == @$reply_id ? 'selected' : '' }}>{{ @$reply->reply }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- campaign_id -->
                    <div id="campaign_id_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Campaign') }}</span>
                        </label>
                        <select name="campaign_id" data-control="select2" data-dropdown-parent="#campaign_id_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $campaigns = \App\Models\Campaign::get(['id', 'name']); ?>
                            @foreach($campaigns as $campaign)
                            <option value="{{ @$campaign->id }}" {{ @$campaign->id == @$campaign_id ? 'selected' : '' }}>{{ @$campaign->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- custom_attributes -->
                    <div id="custom_attributes_filter" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>{{ trans('main.Custom Attributes') }}</span>
                        </label>
                        <select name="custom_attributes" data-control="select2" data-dropdown-parent="#custom_attributes_filter" class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php
                                $contacts = \App\Models\Contact::pluck('custom_attributes');
                                $values = [];
                                foreach ($contacts as $contact) {
                                    // Since custom_attributes is a JSON column, it should already be decoded as an array.
                                    if (is_array($contact)) {
                                        foreach ($contact as $attribute) {
                                            if (is_array($attribute)) {
                                                $values = array_merge($values, array_values($attribute));
                                            }
                                        }
                                    }
                                }
                                $uniqueValues = array_unique($values);
                            ?>
                            @foreach($uniqueValues as $uniqueValue)
                            <option value="{{ @$uniqueValue }}">{{ @$uniqueValue }}</option>
                            @endforeach
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
                            <option value="{{ @$tag->id }}" {{ @$tag->id == @$tag_id ? 'selected' : '' }}>{{ @$tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- from_date -->
                    <div class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.From Date') }}</label>
                        <input type="datetime-local" class="form-control form-control-solid" placeholder="{{ trans('main.From Date') }}" value="{{ @$from_date }}" name="from_date" />
                    </div>
                    <!-- to_date -->
                    <div class="mb-7">
                        <label class="form-label fs-5 fw-semibold mb-3">{{ trans('main.To Date') }}</label>
                        <input type="datetime-local" class="form-control form-control-solid" placeholder="{{ trans('main.To Date') }}" value="{{ @$to_date }}" name="to_date" />
                    </div>
                    <div id="excel-columns-container"></div>
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
