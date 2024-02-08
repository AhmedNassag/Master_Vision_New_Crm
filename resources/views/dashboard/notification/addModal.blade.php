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
                    <!-- notification -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Notification') }}</label>
                            <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Notification') }}" value="{{ old('notification') }}" name="notification" />
                        </div>
                    </div>
                    <!-- employee_id -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_employee_id">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Employee') }}</span>
                        </label>
                        <select name="employee_id" data-control="select2" data-dropdown-parent="#add_employee_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $employees = \App\Models\Employee::get(['id','name']); ?>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- dept -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_dept">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Department') }}</span>
                        </label>
                        <select name="dept" data-control="select2" data-dropdown-parent="#add_dept" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $departments = \App\Models\Department::get(['id','name']); ?>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
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
