@extends('layouts.app0')


@section('content')

            <!-- validationNotify -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ @$error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- successNotify -->
            @if (session()->has('success'))
                <script id="successNotify" style="display: none;">
                    window.onload = function() {
                        notif({
                            msg: "تمت العملية بنجاح",
                            type: "success"
                        })
                    }
                </script>
            @endif

            <!-- errorNotify -->
            @if (session()->has('error'))
                <script id="errorNotify" style="display: none;">
                    window.onload = function() {
                        notif({
                            msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                            type: "error"
                        })
                    }
                </script>
            @endif

            <!-- Page Wrapper -->
            <div class="page-wrapper p-5">
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header pb-5">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">{{ trans('main.Contacts') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted">{{ trans('main.Edit') }} {{ trans('main.Contact') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('contact.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                                    {{ trans('main.Back') }}
                                    <i class="fas fa-arrow-left"></i>
                                </a>
							</div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <form class="form" action="{{ route('contact.update', 'test') }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="modal-body py-10 px-lg-17">
                            <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                                <div class="row">
                                    <!-- code -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Code') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Code') }}" value="{{ @$contact->code, old('code') }}" name="code" disabled/>
                                    </div>
                                    <!-- branch_id -->
                                    <div class="col-md-6 fv-row" id="branch_id">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Branch') }}</span>
                                        </label>
                                        <select name="branch_id" data-control="select2" data-dropdown-parent="#branch_id" class="form-select form-select-solid">
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $branches = \App\Models\Branch::get();
                                                }
                                                else
                                                {
                                                    $branches = \App\Models\Branch::where('id', Auth::user()->employee->branch_id)->get();
                                                }
                                            ?>
                                            @foreach($branches as $branch)
                                                <option value="{{ @$branch->id }}" {{ @$branch->id == @$contact->branch_id ? 'selected' : '' }}>{{ @$branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- name -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ @$contact->name, old('name') }}" name="name" />
                                    </div>
                                    <!-- contact_source_id -->
                                    <div class="col-md-6 fv-row" id="contact_source_id">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.ContactSource') }}</span>
                                        </label>
                                        <select name="contact_source_id" data-control="select2" data-dropdown-parent="#contact_source_id" class="form-select form-select-solid">
                                            <?php $contactSources = \App\Models\ContactSource::get(['id','name']); ?>
                                            @foreach($contactSources as $contactSource)
                                                <option value="{{ @$contactSource->id }}" {{ @$contactSource->id == @$contact->contact_source_id ? 'selected' : '' }}>{{ @$contactSource->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- activity_id -->
                                    <div id="activity_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Activity') }}</span>
                                        </label>
                                        <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id" class="form-select form-select-solid">
                                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                                            @foreach($activities as $activity)
                                                <option value="{{ @$activity->id }}" {{ @$activity->id == @$contact->activity_id ? 'selected' : '' }}>{{ @$activity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- interest_id -->
                                    <div id="interest_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.SubActivity') }}</span>
                                        </label>
                                        <select name="interest_id" data-control="select2" data-dropdown-parent="#interest_id" class="form-select form-select-solid">
                                            <?php $oldSubActivity = \App\Models\SubActivity::where('id', @$contact->interest_id)->first(); ?>
                                            <option value="{{ @$oldSubActivity->id }}" selected>{{ @$oldSubActivity->name }}</option>
                                        </select>
                                    </div>
                                    <!-- mobile -->
                                    <div class="col-md-6 fv-row mt-3">
                                        <label class="required fs-5 fw-semibold mb-2"> {{ trans('main.Mobile') }} </label>
                                        <input id="mobile_whatsapp" name="mobile_whatsapp_checkbox" class="form-check-input" type="checkbox" disabled {{ @$contact->mobile == @$contact->whats_app_mobile ? 'checked' : '' }}> هل هو رقم الواتس
                                        <input type="text" id="mobile" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ @$contact->mobile, old('mobile') }}" name="mobile" />
                                    </div>
                                    <!-- mobile2 -->
                                    <div class="col-md-6 fv-row mt-3">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Mobile2') }}</label>
                                        <input id="mobile2_whatsapp" name="mobile2_whatsapp_checkbox" class="form-check-input" type="checkbox" disabled {{ @$contact->mobile2 == @$contact->whats_app_mobile ? 'checked' : '' }}> هل هو رقم الواتس
                                        <input type="text" id="mobile2" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile2') }}" value="{{ @$contact->mobile2, old('mobile2') }}" name="mobile2" />
                                    </div>
                                    <!-- whats_app_mobile -->
                                    <input type="hidden" id="whats_app_mobile" name="whats_app_mobile" value="{{ @$contact->whats_app_mobile }}">
                                    <!-- email -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Email') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Email') }}" value="{{ @$contact->email, old('email') }}" name="email" />
                                    </div>
                                    <!-- national_id -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.NationalId') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.NationalId') }}" value="{{ @$contact->national_id, old('national_id') }}" name="national_id" />
                                    </div>
                                    <!-- birth_date -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Birth Date') }}</label>
                                        <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.Birth Date') }}" value="{{ @$contact->birth_date, old('birth_date') }}" name="birth_date" />
                                    </div>
                                    <!-- gender -->
                                    <div class="col-md-6 fv-row" id="gender">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Gender') }}</span>
                                        </label>
                                        <select name="gender" data-control="select2" data-dropdown-parent="#gender" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <option value="Male"  {{ @$contact->gender == 'Male' ? 'selected' : '' }}>{{ trans('main.Male') }}</option>
                                            <option value="Female"  {{ @$contact->gender == 'Female' ? 'selected' : '' }}>{{ trans('main.Female') }}</option>
                                        </select>
                                    </div>
                                    <!-- religion -->
                                    <div class="col-md-6 fv-row" id="religion">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Religion') }}</span>
                                        </label>
                                        <select name="religion" data-control="select2" data-dropdown-parent="#religion" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <option value="muslim" {{ @$contact->religion == 'muslim' ? 'selected' : '' }}>{{ trans('main.Muslim') }}</option>
                                            <option value="christian" {{ @$contact->religion == 'christian' ? 'selected' : '' }}>{{ trans('main.Christian') }}</option>
                                            <option value="other" {{ @$contact->religion == 'other' ? 'selected' : '' }}>{{ trans('main.Other') }}</option>
                                        </select>
                                    </div>
                                    <!-- marital_status -->
                                    <div class="col-md-6 fv-row" id="marital_status">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Marital Status') }}</span>
                                        </label>
                                        <select name="marital_status" data-control="select2" data-dropdown-parent="#marital_status" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <option value="single" {{ @$contact->marital_status == 'Single' ? 'selected' : '' }}>{{ trans('main.Single') }}</option>
                                            <option value="married" {{ @$contact->marital_status == 'Married' ? 'selected' : '' }}>{{ trans('main.Married') }}</option>
                                            <option value="absolute" {{ @$contact->marital_status == 'Absolute' ? 'selected' : '' }}>{{ trans('main.Absolute') }}</option>
                                            <option value="widower" {{ @$contact->marital_status == 'Widower' ? 'selected' : '' }}>{{ trans('main.Widower') }}</option>
                                            <option value="other" {{ @$contact->marital_status == 'Other' ? 'selected' : '' }}>{{ trans('main.Other') }}</option>
                                        </select>
                                    </div>
                                    <!-- city_id -->
                                    <div id="city_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.City') }}</span>
                                        </label>
                                        <select name="city_id" data-control="select2" data-dropdown-parent="#city_id" class="form-select form-select-solid">
                                            <?php $cities = \App\Models\City::get(['id','name']); ?>
                                            @foreach($cities as $city)
                                                <option value="{{ @$city->id }}" {{ @$city->id == @$contact->city_id ? 'selected' : '' }}>{{ @$city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- area_id -->
                                    <div id="area_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Area') }}</span>
                                        </label>
                                        <select name="area_id" data-control="select2" data-dropdown-parent="#area_id" class="form-select form-select-solid">
                                            <?php $area = \App\Models\Area::where('id', @$contact->area_id)->first(); ?>
                                            <option value="{{ @$area->id }}" selected>{{ @$area->name }}</option>
                                        </select>
                                    </div>
                                    <!-- address -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Address') }}</label>
                                        <input type="text" class="form-control form-control-solid" value="{{ @$contact->address, old('address') }}" name="address" />
                                    </div>
                                    <!-- industry_id -->
                                    <div id="industry_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Industry') }}</span>
                                        </label>
                                        <select name="industry_id" data-control="select2" data-dropdown-parent="#industry_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <?php $industries = \App\Models\Industry::get(['id','name']); ?>
                                            @foreach($industries as $industry)
                                                <option value="{{ @$industry->id }}" {{ @$industry->id == @$contact->industry_id ? 'selected' : '' }}>{{ @$industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- major_id -->
                                    <div id="major_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Major') }}</span>
                                        </label>
                                        <select name="major_id" data-control="select2" data-dropdown-parent="#major_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <?php $major = \App\Models\Major::where('id', @$contact->major_id)->first(); ?>
                                            <option value="{{ @$major->id }}" selected>{{ @$major->name }}</option>
                                        </select>
                                    </div>
                                    <!-- job_title_id -->
                                    <div id="job_title_id" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.JobTitle') }}</span>
                                        </label>
                                        <select name="job_title_id" data-control="select2" data-dropdown-parent="#job_title_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <?php $jobTitles = \App\Models\JobTitle::get(['id','name']); ?>
                                            @foreach($jobTitles as $jobTitle)
                                                <option value="{{ @$jobTitle->id }}" {{ @$jobTitle->id == @$contact->job_title_id ? 'selected' : '' }}>{{ @$jobTitle->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- company_name -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Company Name') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Company Name') }}" value="{{ @$contact->company_name, old('company_name') }}" name="company_name" />
                                    </div>
                                    <!-- notes -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Notes') }}</label>
                                        <textarea type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Notes') }}" value="{{ old('notes') }}" name="notes">{{ @$contact->notes }}</textarea>
                                    </div>
                                    <!-- tag_ids -->
                                    <div id="tag_ids" class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span>{{ trans('main.Tag') }}</span>
                                        </label>
                                        <select name="tag_ids[]" data-control="select2" data-dropdown-parent="#tag_ids" class="form-select form-select-solid" multiple>
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <?php $tags = \App\Models\Tag::get(['id','name']); ?>
                                            @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ $contact->tags->contains($tag->id) ? 'selected' : '' }}>{{ @$tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- photo -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Photo') }}</label>
                                        <input type="file" class="form-control form-control-solid" name="photo" />
                                        @if($contact->media)
                                            <div class="symbol symbol-100px symbol-circle mb-7">
                                                <img src="{{ asset('attachments/contact/'.@$contact->media->file_name) }}" alt="image" />
                                            </div>
                                        @endif
                                    </div>
                                    <!-- has_special_needs -->
                                    <div class="col-md-6 fv-row form-check form-check-custom form-check-solid">
                                        <input name="has_special_needs" class="form-check-input" type="checkbox" id="same_as_billing" @if(@$contact->has_special_needs === 1) checked="checked" @endif>
                                        <label class="form-check-label" for="same_as_billing">{{ trans('main.Has Special Needs') }}</label>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <!-- id -->
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" value="{{ @$contact->id }}">
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                            </button>
                        </div>
                    </form>

                </div>
                <!-- content container-fluid closed -->
            </div>
            <!-- page-wrapper closed -->
        </div>
        <!-- /Main Wrapper -->
@endsection



@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="activity_id"]').on('change',function(){
                var activity_id = $(this).val();
                if (activity_id) {
                    $.ajax({
                        url:"{{URL::to('admin/subActivityByActivityId')}}/" + activity_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="interest_id"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="interest_id"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="interest_id"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="city_id"]').on('change',function(){
                var city_id = $(this).val();
                if (city_id) {
                    $.ajax({
                        url:"{{URL::to('admin/areaByCityId')}}/" + city_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="area_id"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="area_id"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="area_id"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="industry_id"]').on('change',function(){
                var industry_id = $(this).val();
                if (industry_id) {
                    $.ajax({
                        url:"{{URL::to('admin/majorByIndustryId')}}/" + industry_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="major_id"]').empty();
                            $.each(data,function(key,value) {
                                $('select[name="major_id"]').append('<option class="form-control" value="'+ value["id"] +'">' + value["name"] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="major_id"]').empty();
                    console.log('not work')
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileCheckbox = document.getElementById('mobile_whatsapp');
            const mobile2Checkbox = document.getElementById('mobile2_whatsapp');
            const mobileInput = document.getElementById('mobile');
            const mobile2Input = document.getElementById('mobile2');
            const whatsAppMobileInput = document.getElementById('whats_app_mobile');

            function toggleCheckboxState() {
                mobileCheckbox.disabled = !mobileInput.value;
                mobile2Checkbox.disabled = !mobile2Input.value;
            }

            mobileCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    mobile2Checkbox.checked = false;
                    whatsAppMobileInput.value = mobileInput.value;
                } else {
                    whatsAppMobileInput.value = '';
                }
            });

            mobile2Checkbox.addEventListener('change', function () {
                if (this.checked) {
                    mobileCheckbox.checked = false;
                    whatsAppMobileInput.value = mobile2Input.value;
                } else {
                    whatsAppMobileInput.value = '';
                }
            });

            // Update hidden input value when mobile inputs change
            mobileInput.addEventListener('input', function () {
                if (mobileCheckbox.checked) {
                    whatsAppMobileInput.value = this.value;
                }
                toggleCheckboxState();
            });

            mobile2Input.addEventListener('input', function () {
                if (mobile2Checkbox.checked) {
                    whatsAppMobileInput.value = this.value;
                }
                toggleCheckboxState();
            });

            // Initial check to enable/disable checkboxes based on input values
            toggleCheckboxState();
        });
    </script>
@endsection
