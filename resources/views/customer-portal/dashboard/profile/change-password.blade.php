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
                                    <li class="breadcrumb-item text-muted">{{trans('main.Edit')}} {{ trans('main.Password') }}</li>
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

                    <form class="form" action="{{route('profile.password.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body py-10 px-lg-17">
                            <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                                <div class="row">
                                    <!-- old-password -->
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
                                    </div>
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
