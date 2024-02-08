<!--begin::Add Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form class="form" action="{{ route('employeeTarget.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.EmployeeTarget') }}</h2>
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
                            <?php $employees = \App\Models\Employee::get(['id','name']); ?>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- month -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_month">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Month') }}</span>
                        </label>
                        <?php $year = date('Y'); ?>
                        <select name="month" data-control="select2" data-dropdown-parent="#add_month" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <option value="Jan-{{ $year }}">{{ trans('main.Jan') }} - {{ $year }}</option>
                            <option value="Feb-{{ $year }}">{{ trans('main.Feb') }} - {{ $year }}</option>
                            <option value="Mar-{{ $year }}">{{ trans('main.Mar') }} - {{ $year }}</option>
                            <option value="Apr-{{ $year }}">{{ trans('main.Apr') }} - {{ $year }}</option>
                            <option value="May-{{ $year }}">{{ trans('main.May') }} - {{ $year }}</option>
                            <option value="Jun-{{ $year }}">{{ trans('main.Jun') }} - {{ $year }}</option>
                            <option value="Jul-{{ $year }}">{{ trans('main.Jul') }} - {{ $year }}</option>
                            <option value="Aug-{{ $year }}">{{ trans('main.Aug') }} - {{ $year }}</option>
                            <option value="Sep-{{ $year }}">{{ trans('main.Sep') }} - {{ $year }}</option>
                            <option value="Oct-{{ $year }}">{{ trans('main.Oct') }} - {{ $year }}</option>
                            <option value="Nov-{{ $year }}">{{ trans('main.Nov') }} - {{ $year }}</option>
                            <option value="Dec-{{ $year }}">{{ trans('main.Dec') }} - {{ $year }}</option>
                        </select>
                    </div>
                    <div>
                        <div class="container ">

                        </div>
                        <table id="activity-table" class="table w-100 mx-auto my-5">
                            <thead>

                            </thead>
                            <tbody id="tBody" class="row ">
                                <tr class="col-2">
                                    <button id="addBtn" type="button" onclick="addProduct();" class="d-block btn btn-info ">{{ trans('main.Add') }} {{ trans('main.Target') }}</button>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- target_amount -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2" for="target_amount">{{ trans('admin.Total Amount Target') }}* :</label>
                            <input class="form-control form-control-solid calls-input" readonly name="target_amount" type="number" value="0">
                        </div>
                    </div>
                    <!-- target_meeting -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2" for="target_meeting">{{ trans('admin.Total Calls / Meetings Target') }}* :</label>
                            <input class="form-control form-control-solid calls-input" readonly name="target_meeting" type="number" value="0">
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
