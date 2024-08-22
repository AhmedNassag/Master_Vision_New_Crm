@extends('customer-portal.layout')


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
                                <h3 class="page-title">{{ trans('main.Show Profile') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted">{{ trans('main.Edit Profile') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('user.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                                    {{ trans('main.Back') }}
                                    <i class="fas fa-arrow-left"></i>
                                </a>
							</div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <form class="form" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body py-10 px-lg-17">
                            <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                                <div class="row">
                                    <!-- name -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ @$customer->name, old('name') }}" name="name" />
                                    </div>
                                    <!-- mobile -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Mobile') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ @$customer->mobile, old('mobile') }}" name="mobile" />
                                    </div>
                                    <!-- email -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Email') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Email') }}" value="{{ @$customer->email, old('email') }}" name="email" />
                                    </div>
                                    <!-- nid -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.National ID') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.National ID') }}" value="{{ @$customer->national_id, old('national_id') }}" name="national_id" />
                                        {{-- <select name="national_id" data-control="select2" data-dropdown-parent="#national_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}</option>
                                            <option value="0" {{ @$user->active == 0 ? 'selected' : '' }}>{{ trans('main.InActive') }}</option>
                                        </select> --}}
                                    </div>

                                    {{-- <!-- old-password -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Old Password') }}</label>
                                        <input type="password" class="form-control form-control-solid" placeholder="{{ trans('main.Old Password') }}" value="{{ old('password') }}" name="old_Password" />
                                    </div>
                                    <!-- password -->
                                    <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-semibold mb-2">{{ trans('main.Password') }}</label>
                                    <input type="password" class="form-control form-control-solid" placeholder="{{ trans('main.Password') }}" value="{{ old('password') }}" name="password" />
                                    </div>
                                    <!-- password-confirmation -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Confirm Password') }}</label>
                                        <input type="password" class="form-control form-control-solid" placeholder="{{ trans('main.Confirm Password') }}" value="" name="password_confirmation" />
                                    </div> --}}
                                     <!-- job-title -->
                                     <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Job Title') }}</label>
                                        {{-- <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.National ID') }}" value="{{ @$user->national_id, old('national_id') }}" name="national_id" /> --}}
                                        <select name="job_title_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}</option>
                                            @foreach ( $jobTitles as $jobTitle)
                                                <option value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
                                            @endforeach
                                            {{-- <option value="0" {{ @$user->active == 0 ? 'selected' : '' }}>{{ trans('main.InActive') }}</option> --}}
                                        </select>
                                    </div>
                                    {{-- data-control="select2" data-dropdown-parent="#job_title_id" --}}

                                    <!-- photo -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Photo') }}</label>
                                        <input type="file" class="form-control form-control-solid" name="photo" />
                                        @if($customer->media)
                                            <div class="symbol symbol-100px symbol-circle mb-7">
                                                <img src="{{ asset('attachments/customer/'.@$customer->media->file_name) }}" alt="image" />
                                            </div>
                                        @endif
                                    </div>
                                    <!-- has_branch_access -->
                                    {{-- <div class="col-md-6 fv-row form-check form-check-custom form-check-solid m-4">
                                        <input name="has_branch_access" class="form-check-input" type="checkbox" id="same_as_billing" @if(@$user->employee->has_branch_access === 1) checked="checked" @endif>
                                        <label class="form-check-label" for="same_as_billing">{{ trans('main.Has Branch Access') }}</label>
                                    </div> --}}
                                </div>
                            <!-- </div> -->
                        </div>
                        <!-- id -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="{{ @$customer->id }}">
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

@endsection
