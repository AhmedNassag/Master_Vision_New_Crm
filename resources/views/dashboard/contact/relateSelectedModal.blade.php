<!--begin::Add Modal-->
<div class="modal fade" id="relate_selected" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('contact.relateSelected') }}" method="POST" id="delete_multi_category_form">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Relate Employee') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- employee_id -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_employee_id">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Employee') }}</span>
                        </label>
                        <select name="employee_id" data-control="select2" data-dropdown-parent="#add_employee_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php
                                if(Auth::user()->roles_name[0] == "Admin")
                                {
                                    $employees = \App\Models\Employee::get(['id','name']);
                                }
                                else
                                {
                                    $employees = \App\Models\Employee::where('branch_id', auth()->user()->employee->branch_id)->get(['id','name']);
                                }
                            ?>
                            @foreach($employees as $employee)
                                <option value="{{ @$employee->id }}">{{ @$employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-btn delete-action">
                        <!-- relate_selected_id -->
                        <input class="text" type="hidden" id="relate_selected_id" name="relate_selected_id" value=''>
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
