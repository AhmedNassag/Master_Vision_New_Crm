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
                        <h3 class="page-title">{{ trans('main.Customers') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ trans('main.Add') }} {{ trans('main.Customer') }}</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('customer.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                            {{ trans('main.Back') }}
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form class="form" action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body py-10 px-lg-17">
                    <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                        <div class="row">
                            <!-- name -->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ old('name') }}" name="name" />
                            </div>
                            <!-- email -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-semibold mb-2">{{ trans('main.Email') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Email') }}" value="{{ old('email') }}" name="email" />
                            </div>
                            <!-- contact_source_id -->
                            <div class="col-md-6 fv-row" id="contact_source_id">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2 required">
                                    <span>{{ trans('main.ContactSource') }}</span>
                                </label>
                                <select name="contact_source_id" data-control="select2" data-dropdown-parent="#contact_source_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $contactSources = \App\Models\ContactSource::get(['id','name']); ?>
                                    @foreach($contactSources as $contactSource)
                                        <option value="{{ @$contactSource->id }}">{{ @$contactSource->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- activity_id -->
                            <div id="activity_id" class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">{{ trans('main.Activity') }}</span>
                                </label>
                                <select name="activity_id" data-control="select2" data-dropdown-parent="#activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                                    @foreach($activities as $activity)
                                        <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- mobile -->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Mobile') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ old('mobile') }}" name="mobile" />
                            </div>
                            <!-- mobile2 -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-semibold mb-2">{{ trans('main.Mobile2') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile2') }}" value="{{ old('mobile2') }}" name="mobile2" />
                            </div>
                            <!-- contact_category_id -->
                            <div class="col-md-6 fv-row" id="contact_category_id">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span>{{ trans('main.ContactCategory') }}</span>
                                </label>
                                <select name="contact_category_id" data-control="select2" data-dropdown-parent="#contact_category_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $contacCategories = \App\Models\ContactCategory::get(['id','name']); ?>
                                    @foreach($contacCategories as $contactCategory)
                                        <option value="{{ @$contactCategory->id }}">{{ @$contactCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- national_id -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-semibold mb-2">{{ trans('main.NationalId') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.NationalId') }}" value="{{ old('national_id') }}" name="national_id" />
                            </div>
                            <!-- birth_date -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-semibold mb-2">{{ trans('main.Birth Date') }}</label>
                                <input type="date" class="form-control form-control-solid" placeholder="{{ trans('main.Birth Date') }}" value="{{ old('birth_date') }}" name="birth_date" />
                            </div>
                            <!-- gender -->
                            <div class="col-md-6 fv-row" id="gender">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span>{{ trans('main.Gender') }}</span>
                                </label>
                                <select name="gender" data-control="select2" data-dropdown-parent="#gender" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="Male">{{ trans('main.Male') }}</option>
                                    <option value="Female">{{ trans('main.Female') }}</option>
                                </select>
                            </div>
                            <!-- city_id -->
                            <div id="city_id" class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span>{{ trans('main.City') }}</span>
                                </label>
                                <select name="city_id" data-control="select2" data-dropdown-parent="#city_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $cities = \App\Models\City::get(['id','name']); ?>
                                    @foreach($cities as $city)
                                        <option value="{{ @$city->id }}">{{ @$city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- area_id -->
                            <div id="area_id" class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span>{{ trans('main.Area') }}</span>
                                </label>
                                <select name="area_id" data-control="select2" data-dropdown-parent="#area_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>

                                </select>
                            </div>
                            <!-- industry_id -->
                            <div id="industry_id" class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span>{{ trans('main.Industry') }}</span>
                                </label>
                                <select name="industry_id" data-control="select2" data-dropdown-parent="#industry_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $industries = \App\Models\Industry::get(['id','name']); ?>
                                    @foreach($industries as $industry)
                                        <option value="{{ @$industry->id }}">{{ @$industry->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- major_id -->
                            <div id="major_id" class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span>{{ trans('main.Major') }}</span>
                                </label>
                                <select name="major_id" data-control="select2" data-dropdown-parent="#major_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>

                                </select>
                            </div>
                            <!-- company_name -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-semibold mb-2">{{ trans('main.Company Name') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Company Name') }}" value="{{ old('company_name') }}" name="company_name" />
                            </div>
                            <!-- job_title_id -->
                            <div id="job_title_id" class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span>{{ trans('main.JobTitle') }}</span>
                                </label>
                                <select name="job_title_id" data-control="select2" data-dropdown-parent="#job_title_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $jobTitles = \App\Models\JobTitle::get(['id','name']); ?>
                                    @foreach($jobTitles as $jobTitle)
                                        <option value="{{ @$jobTitle->id }}">{{ @$jobTitle->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- notes -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-semibold mb-2">{{ trans('main.Notes') }}</label>
                                <textarea type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Notes') }}" value="{{ old('notes') }}" name="notes"></textarea>
                            </div>
                            <!-- photo -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-semibold mb-2">{{ trans('main.Photo') }}</label>
                                <input type="file" class="form-control form-control-solid" value="{{ old('photo') }}" name="photo" />
                            </div>
                        </div>
                    <!-- </div> -->
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
@endsection
