<!--begin::Add Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('notification.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.Notification') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- branch_id -->
                    <div id="branch_id" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Branch') }}</span>
                        </label>
                        <select name="branch_id" data-control="select2" data-dropdown-parent="#branch_id" class="form-select form-select-solid">
                            <option value="">{{ trans('main.All') }}</option>
                            <?php
                                if(Auth::user()->roles_name[0] == "Admin")
                                {
                                    $branches = \App\Models\Branch::get(['id','name']);
                                }
                                else
                                {
                                    $branches = \App\Models\Branch::where('id', auth()->user()->employee->branch_id)->get(['id','name']);
                                }
                            ?>
                            @foreach($branches as $branch)
                                <option value="{{ @$branch->id }}">{{ @$branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- dept -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_dept">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">{{ trans('main.Department') }}</label>
                        <select name="dept" data-control="select2" data-dropdown-parent="#add_dept" class="form-select form-select-solid">
                            <option value="">{{ trans('main.All') }}</option>
                            <?php $departments = \App\Models\Department::get(['id','name']); ?>
                            @foreach($departments as $department)
                                <option value="{{ @$department->id }}">{{ @$department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- employee_id -->
                    <div id="employee_id" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Employee') }}</span>
                        </label>
                        <select name="employee_ids[]" data-control="select2" data-dropdown-parent="#employee_id" class="form-select form-select-solid" multiple>
                            <option value="" selected>{{ trans('main.All') }}</option>
                            <?php
                                if(Auth::user()->roles_name[0] == "Admin")
                                {
                                    $employees = \App\Models\Employee::hidden()->get(['id','name']);
                                }
                                else
                                {
                                    $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                }
                            ?>
                            @foreach($employees as $employee)
                                <option value="{{ @$employee->id }}">{{ @$employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- notification -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Notification') }}</label>
                            <textarea type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Notification') }}" value="{{ old('notification') }}" name="notification" cols="5" rows="5" required></textarea>
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
<!--end::Add Modal-->
