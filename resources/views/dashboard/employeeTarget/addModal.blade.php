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
                    <!-- month -->
                    <div class="d-flex flex-column mb-5 fv-row" id="add_month">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Month') }}</span>
                        </label>
                        <?php
                            $today = now();
                            $currentMonth = $today->format('n'); // Get the current month number
                            $currentYear  = $today->year;
                            // If it's December, get months for the next year
                            $year = ($currentMonth == 12) ? $currentYear + 1 : $currentYear;
                            // Create an array to hold the month names
                            $months = [];
                            // Loop through the months
                            for ($i = $currentMonth; $i <= 12; $i++) {
                                $months[] = date('M', mktime(0, 0, 0, $i, 1));
                            }
                            // If it's December, also get the months for the next year
                            if ($currentMonth == 12) {
                                for ($i = 1; $i <= 12; $i++) {
                                    $months[] = date('M', mktime(0, 0, 0, $i, 1, $year));
                                }
                            }
                            // $year  = date('Y');
                        ?>
                        <select name="month" data-control="select2" data-dropdown-parent="#add_month" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            @foreach($months as $month)
                                <option value="{{ @$month }}-{{ @$year }}">{{ trans('main.'.$month) }} - {{ @$year }}</option>
                            @endforeach
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
                                <tr class="row align-items-center justify-content-between ">
                                    <td class="col-4">
                                        <div class="d-flex flex-column mb-5 fv-row" id="add_activity_id">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">{{ trans('main.Activity') }}</span>
                                            </label>
                                            <select name="activity_id[]" data-control="select2" data-dropdown-parent="#add_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid activity-select">
                                                <option value="">{{ trans('main.Select') }}...</option>
                                                <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
                                                @foreach ($activities as $activity)
                                                    <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-4">
                                        <div class="row mb-5">
                                            <div class="col-md-12 fv-row">
                                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.AmountTarget') }}</label>
                                                <input type="text" class="form-control form-control-solid amount-input" placeholder="{{ trans('main.AmountTarget') }}" value="0" name="amount_target[]" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-4">
                                        <div class="row mb-5">
                                            <div class="col-md-12 fv-row">
                                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.CallsTarget') }}</label>
                                                <input type="text" class="form-control form-control-solid calls-input" placeholder="{{ trans('main.CallsTarget') }}" value="0" name="calls_target[]" />
                                            </div>
                                         </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- target_amount -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2" for="target_amount">{{ trans('main.Total Amount Target') }}* :</label>
                            <input class="form-control form-control-solid calls-input" readonly name="target_amount" type="number" value="0">
                        </div>
                    </div>
                    <!-- target_meeting -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2" for="target_meeting">{{ trans('main.Total Calls / Meetings Target') }}* :</label>
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
