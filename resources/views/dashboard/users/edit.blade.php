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
                                <h3 class="page-title">{{ trans('main.Employees') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted">{{ trans('main.Edit') }} {{ trans('main.Employee') }}</li>
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

                    <form class="form" action="{{ route('user.update', 'test') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body py-10 px-lg-17">
                            <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                                <div class="row">
                                    <!-- name -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ @$user->name, old('name') }}" name="name" />
                                    </div>
                                    <!-- mobile -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Mobile') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Mobile') }}" value="{{ @$user->mobile, old('mobile') }}" name="mobile" />
                                    </div>
                                    <!-- email -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Email') }}</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Email') }}" value="{{ @$user->email, old('email') }}" name="email" />
                                    </div>
                                    <!-- branch_id -->
                                    <div class="col-md-6 fv-row" id="branch_id">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Branch') }}</span>
                                        </label>
                                        <select name="branch_id" data-control="select2" data-dropdown-parent="#branch_id" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <?php
                                                if(Auth::user()->roles_name[0] == "Admin")
                                                {
                                                    $branches = \App\Models\Branch::get(['id','name']);
                                                }
                                                else
                                                {
                                                    $branches = \App\Models\Branch::where('id', Auth::user()->employee->branch_id)->get(['id','name']);
                                                }
                                            ?>
                                            @foreach($branches as $branch)
                                                <option value="{{ @$branch->id }}" {{ @$user->employee->branch_id == $branch->id ? 'selected' :''}}>{{ @$branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- dept -->
                                    <div class="col-md-6 fv-row" id="dept">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Department') }}</span>
                                        </label>
                                        <select name="dept" data-control="select2" data-dropdown-parent="#dept" class="form-select form-select-solid">
                                            <option value="">{{ trans('main.Select') }}...</option>
                                            <?php $departments = \App\Models\Department::get(['id','name']); ?>
                                            @foreach($departments as $department)
                                                <option value="{{ @$department->id }}" {{ @$user->employee->dept == $department->id ? 'selected' :''}}>{{ @$department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- status -->
                                    <div class="col-md-6 fv-row" id="status">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Status') }}</span>
                                        </label>
                                        <select name="status" data-control="select2" data-dropdown-parent="#status" class="form-select form-select-solid">
                                            <option value="1" {{ @$user->active == 1 ? 'selected' : '' }}>{{ trans('main.Active') }}</option>
                                            <option value="0" {{ @$user->active == 0 ? 'selected' : '' }}>{{ trans('main.InActive') }}</option>
                                        </select>
                                    </div>
                                    <!-- password -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Password') }}</label>
                                        <input type="password" class="form-control form-control-solid" placeholder="{{ trans('main.Password') }}" value="{{ old('password') }}" name="password" />
                                    </div>
                                    <!-- roles_name -->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Role') }}</label>
                                        {{-- {!! Form::select('roles_name[]', $roles, $userRole, array('class' => 'form-control')) !!} --}}
                                        <select class="form-control form-select" name="roles_name" required>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->name }}" {{ $user->roles[0]->name == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- photo -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-semibold mb-2">{{ trans('main.Photo') }}</label>
                                        <input type="file" class="form-control form-control-solid" name="photo" />
                                        @if($user->media)
                                            <div class="symbol symbol-100px symbol-circle mb-7">
                                                <img src="{{ asset('attachments/user/'.@$user->media->file_name) }}" alt="image" />
                                            </div>
                                        @endif
                                    </div>
                                    <!-- has_branch_access -->
                                    <div class="col-md-6 fv-row form-check form-check-custom form-check-solid m-4">
                                        <input name="has_branch_access" class="form-check-input" type="checkbox" id="same_as_billing" @if(@$user->employee->has_branch_access === 1) checked="checked" @endif>
                                        <label class="form-check-label" for="same_as_billing">{{ trans('main.Has Branch Access') }}</label>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <!-- id -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="{{ @$user->id }}">
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
