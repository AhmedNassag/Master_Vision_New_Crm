<!--begin::Add Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form class="form" action="{{ route('employeeTarget.store') }}" method="POST" enctype="multipart/form-data" id="add-form">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.EmployeeTarget') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="row">
                        <!-- employee_id -->
                        <div class="d-flex col-lg-6 flex-column mb-5 fv-row" id="add_employee_id">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">{{ trans('main.Employee') }}</span>
                            </label>
                            <select name="employee_id" data-control="select2" data-dropdown-parent="#add_employee_id" class="form-select form-select-solid">
                                <option value="">{{ trans('main.Select') }}...</option>
                                <?php
                                if (Auth::user()->roles_name[0] == "Admin") {
                                    $employees = \App\Models\Employee::get(['id', 'name']);
                                } else {
                                    $employees = \App\Models\Employee::where('branch_id', auth()->user()->employee->branch_id)->get(['id', 'name']);
                                }
                                ?>
                                @foreach($employees as $employee)
                                <option value="{{ @$employee->id }}">{{ @$employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- month -->
                        <div class="d-flex col-lg-6 flex-column mb-5 fv-row" id="add_month">
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
                            <select name="month" data-control="select2" data-dropdown-parent="#add_month" class="form-select form-select-solid">
                                <option value="">{{ trans('main.Select') }}...</option>
                                @foreach($months as $month)
                                <option value="{{ @$month }}-{{ @$year }}">{{ trans('main.'.$month) }} - {{ @$year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="container ">

                        </div>
                        <table id="activity-table" class="table w-100 mx-auto my-5">
                            <thead>

                            </thead>
                            <tbody id="tBody" class="row">
                                <tr class="col-3">
                                    <td colspan="3">
                                        <button id="addBtn" type="button" onclick="addProduct();" class="d-block btn btn-info">
                                            {{ trans('main.Add') }} {{ trans('main.Target') }}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="row align-items-center justify-content-between">
                                    <td class="col-lg-4">
                                        <div class="d-flex flex-column mb-5 fv-row" id="add_activity_id">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">{{ trans('main.Activity') }}</span>
                                            </label>
                                            <select name="activity_id[]" data-control="select2" data-dropdown-parent="#add_activity_id" class="form-select form-select-solid activity-select">
                                                <option value="">{{ trans('main.Select') }}...</option>
                                                <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
                                                @foreach ($activities as $activity)
                                                <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-lg-4">
                                        <div class="row mb-5">
                                            <div class="col-md-12 fv-row">
                                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.AmountTarget') }}</label>
                                                <input type="text" class="form-control form-control-solid amount-input" placeholder="{{ trans('main.AmountTarget') }}" value="0" name="amount_target[]" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-lg-4">
                                        <div class="row mb-5">
                                            <div class="col-md-12 fv-row">
                                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.CallsTarget') }}</label>
                                                <input type="text" class="form-control form-control-solid calls-input" placeholder="{{ trans('main.CallsTarget') }}" value="0" name="calls_target[]" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-lg-4">
                                        <div class="row mb-5">
                                            <div class="col-md-12 fv-row">
                                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.ContactsTarget') }}</label>
                                                <input type="text" class="form-control form-control-solid contacts-input" placeholder="{{ trans('main.ContactsTarget') }}" value="0" name="contacts_target[]" />
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                            </tbody>

                        </table>
                        <!-- <table id="activity-table" class="table w-100 mx-auto my-5">

                            <tbody id="tBody" class="row">
                                <tr class="col-2">
                                    <td colspan="3">
                                        <button id="addBtn" type="button" onclick="addProduct();" class="d-block btn btn-info">
                                            إضافة التارجت
                                        </button>
                                    </td>
                                </tr>

                                <tr class="row align-items-center justify-content-between">
                                    <td class="col-4">
                                        <div class="d-flex flex-column mb-5 fv-row" id="add_activity_id">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">النشاط</span>
                                            </label>
                                            <select name="activity_id[]" data-control="select2" data-dropdown-parent="#add_activity_id" class="form-select form-select-solid activity-select select2-hidden-accessible" data-select2-id="select2-data-13-8dte" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option value="" data-select2-id="select2-data-15-nipa">اختر...</option>
                                                <option value="1">السياحة الدينية</option>
                                                <option value="2">السياحة الداخلية</option>
                                                <option value="3">التأشيرات</option>
                                                <option value="4">حجز طيران</option>
                                                <option value="5">حجز فنادق</option>
                                                <option value="6">تنظيم مؤتمرات</option>
                                                <option value="7">السياحة الخارجية</option>
                                                <option value="8">المطهرات</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="rtl" data-select2-id="select2-data-14-tvuq" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid activity-select" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-activity_id-f2-container" aria-controls="select2-activity_id-f2-container"><span class="select2-selection_rendered" id="select2-activity_id-f2-container" role="textbox" aria-readonly="true" title="اختر...">اختر...</span><span class="select2-selection_arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </td>
                                    <td class="col-4">
                                        <div class="row mb-5">
                                            <div class="col-md-12 fv-row">
                                                <label class="required fs-5 fw-semibold mb-2">المبالغ المسنهدفة</label>
                                                <input type="text" class="form-control form-control-solid amount-input" placeholder="المبالغ المسنهدفة" value="0" name="amount_target[]">
                                            </div>
                                        </div>
                                    </td>

                                    <td class="col-4">
                                        <div class="row mb-5">
                                            <div class="col-md-12 fv-row">
                                                <label class="required fs-5 fw-semibold mb-2">المكالمات المستهدفة</label>
                                                <input type="text" class="form-control form-control-solid calls-input" placeholder="المكالمات المستهدفة" value="0" name="calls_target[]">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->


                    </div>
                    <!-- target_amount -->
                    <div class="row mb-5">
                        <div class="col-lg-6 fv-row">
                            <label class="required fs-5 fw-semibold mb-2" for="target_amount">{{ trans('main.Total Amount Target') }}* :</label>
                            <input class="form-control form-control-solid calls-input" readonly name="target_amount" type="number" value="0">
                        </div>
                        <div class="col-lg-6 fv-row">
                            <label class="required fs-5 fw-semibold mb-2" for="target_meeting">{{ trans('main.Total Calls / Meetings Target') }}* :</label>
                            <input class="form-control form-control-solid calls-input" readonly name="target_meeting" type="number" value="0">
                        </div>
                        <div class="col-lg-6 fv-row">
                            <label class="required fs-5 fw-semibold mb-2" for="target_meeting">{{ trans('main.Total Contacts') }}* :</label>
                            <input class="form-control form-control-solid calls-input" readonly name="target_contact" type="number" value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button type="submit" class="btn btn-primary" id="submitButton" onclick="disableButton()">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Add Modal-->



{{--
<script>
    function disableButton() {
        document.getElementById('submitButton').disabled = true;
        document.getElementById('add-form').submit();
    }
</script>
--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select the form by ID
        var form = document.getElementById('add-form');

        // Listen for the form's submit event
        form.addEventListener('submit', function (event) {
            // Select the button inside the form
            var submitButton = document.getElementById('submitButton');

            // Disable the button to prevent multiple clicks
            submitButton.disabled = true;

            // Optional: Change button text or add loading indicator
            submitButton.innerHTML = '<span class="indicator-label">جاري الحفظ</span>';
        });
    });
</script>
