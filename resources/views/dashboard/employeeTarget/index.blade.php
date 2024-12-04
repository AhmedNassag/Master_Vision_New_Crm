@extends('layouts.app0')
@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <h1
                                class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                                {{ trans('main.Data List') }}</h1>
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{ route('home') }}"
                                        class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">{{ trans('main.EmployeeTargets') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title"></div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <i class="ki-outline ki-filter fs-2"></i>{{ trans('main.Filter') }}</button>
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                                        id="kt-toolbar-filter">
                                        <div class="px-7 py-5">
                                            <div class="fs-4 text-gray-900 fw-bold">{{ trans('main.Filter') }}</div>
                                        </div>
                                        <div class="separator border-gray-200"></div>
                                        <form action="{{ route('employeeTarget.index') }}" method="get">
                                            <div class="px-7 py-5">
                                                <div class="mb-10" id="employee_id">
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                        <span class="required">{{ trans('main.Employee') }}</span>
                                                    </label>
                                                    <select name="employee_id" data-control="select2" data-dropdown-parent="#employee_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                                        <option value="">{{ trans('main.Select') }}...</option>
                                                        <?php
                                                        if (Auth::user()->roles_name[0] == 'Admin') {
                                                            $employees = \App\Models\Employee::hidden()->get(['id', 'name']);
                                                        } else {
                                                            $employees = \App\Models\Employee::hidden()->where('branch_id', auth()->user()->employee->branch_id)->get(['id', 'name']);
                                                        }
                                                        ?>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ @$employee->id }}" {{ @$employee->id == @$employee_id ? 'selected' : '' }}>{{ @$employee->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-10" id="month">
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                        <span class="required">{{ trans('main.Month') }}</span>
                                                    </label>
                                                    <?php $year = date('Y'); ?>
                                                    <select name="month" data-control="select2"
                                                        data-dropdown-parent="#month"
                                                        data-placeholder="{{ trans('main.Select') }}..."
                                                        class="form-select form-select-solid">
                                                        <option value="">{{ trans('main.Select') }}...</option>
                                                        <option value="Jan-{{ @$year }}"  {{ @$month == 'Jan-'.$year ? 'selected' : '' }}>{{ trans('main.Jan') }} - {{ @$year }}</option>
                                                        <option value="Feb-{{ @$year }}"  {{ @$month == 'Feb-'.$year ? 'selected' : '' }}>{{ trans('main.Feb') }} - {{ @$year }}</option>
                                                        <option value="Mar-{{ @$year }}"  {{ @$month == 'Mar-'.$year ? 'selected' : '' }}>{{ trans('main.Mar') }} - {{ @$year }}</option>
                                                        <option value="Apr-{{ @$year }}"  {{ @$month == 'Apr-'.$year ? 'selected' : '' }}>{{ trans('main.Apr') }} - {{ @$year }}</option>
                                                        <option value="May-{{ @$year }}"  {{ @$month == 'May-'.$year ? 'selected' : '' }}>{{ trans('main.May') }} - {{ @$year }}</option>
                                                        <option value="Jun-{{ @$year }}"  {{ @$month == 'Jun-'.$year ? 'selected' : '' }}>{{ trans('main.Jun') }} - {{ @$year }}</option>
                                                        <option value="Jul-{{ @$year }}"  {{ @$month == 'Jul-'.$year ? 'selected' : '' }}>{{ trans('main.Jul') }} - {{ @$year }}</option>
                                                        <option value="Aug-{{ @$year }}"  {{ @$month == 'Aug-'.$year ? 'selected' : '' }}>{{ trans('main.Aug') }} - {{ @$year }}</option>
                                                        <option value="Sep-{{ @$year }}"  {{ @$month == 'Sep-'.$year ? 'selected' : '' }}>{{ trans('main.Sep') }} - {{ @$year }}</option>
                                                        <option value="Oct-{{ @$year }}"  {{ @$month == 'Oct-'.$year ? 'selected' : '' }}>{{ trans('main.Oct') }} - {{ @$year }}</option>
                                                        <option value="Nov-{{ @$year }}"  {{ @$month == 'Nov-'.$year ? 'selected' : '' }}>{{ trans('main.Nov') }} - {{ @$year }}</option>
                                                        <option value="Dec-{{ @$year }}"  {{ @$month == 'Dec-'.$year ? 'selected' : '' }}>{{ trans('main.Dec') }} - {{ @$year }}</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">{{ trans('main.Reset') }}</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">{{ trans('main.Apply') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--begin::Add-->
                                    @can('إضافة تارجت الموظفين')
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#add_modal">{{ trans('main.Add New') }}</button>
                                    @endcan
                                    <!--end::Add-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
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

                            <!-- success Notify -->
                            @if (session()->has('success'))
                                <script id="successNotify">
                                    window.onload = function() {
                                        notif({
                                            msg: "تمت العملية بنجاح",
                                            type: "success"
                                        })
                                    }
                                </script>
                            @endif

                            <!-- error Notify -->
                            @if (session()->has('error'))
                                <script id="errorNotify">
                                    window.onload = function() {
                                        notif({
                                            msg: "لقد حدث خطأ.. برجاء المحاولة مرة أخرى!",
                                            type: "error"
                                        })
                                    }
                                </script>
                            @endif

                            <!-- canNotDeleted Notify -->
                            @if (session()->has('canNotDeleted'))
                                <script id="canNotDeleted">
                                    window.onload = function() {
                                        notif({
                                            msg: "لا يمكن الحذف لوجود بيانات أخرى مرتبطة بها..!",
                                            type: "error"
                                        })
                                    }
                                </script>
                            @endif
                            <div class="table-responsive">

                                <!-- pagination -->
                                <form method="GET" action="{{ url('admin/employeeTarget') }}">
                                    @foreach (request()->except('perPage') as $key => $value)
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach
                                    <select name="perPage" onchange="this.form.submit()">
                                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </form>

                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ trans('main.Employee') }}</th>
                                            <th class="text-center">{{ trans('main.Month') }}</th>
                                            <th class="text-center">{{ trans('main.AmountTarget') }}</th>
                                            <th class="text-center">{{ trans('main.CallsTarget') }}</th>
                                            <th class="text-center">{{ trans('main.ContactsTarget') }}</th>
                                            <th class="text-center min-w-70px">{{ trans('main.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @if ($data->count() > 0)
                                            @foreach ($data as $key => $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ @$key + 1 }}
                                                    </td>
                                                    <td class="text-center">{{ @$item->employee->name }}</td>
                                                    <td class="text-center">{{ @$item->month }}</td>
                                                    <td class="text-center">{{ number_format(@$item->target_amount,0) }}</td>
                                                    <td class="text-center">{{ @$item->target_meeting }}</td>
                                                    <td class="text-center">{{ @$item->target_contact }}</td>
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                            {{ trans('main.Actions') }}
                                                            <i class="ki-outline ki-down fs-5 ms-1"></i>
                                                        </a>
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                            @can('تعديل تارجت الموظفين')
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('employeeTarget.edit', $item->id) }}" class="menu-link px-3">{{ trans('main.Edit') }}</a>
                                                                </div>
                                                            @endcan
                                                            @can('حذف تارجت الموظفين')
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ @$item->id }}">{{ trans('main.Delete') }}</a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('dashboard.employeeTarget.deleteModal')
                                            @endforeach
                                        @else
                                            <tr>
                                                <th class="text-center" colspan="10">
                                                    <div class="col mb-3 d-flex">
                                                        <div class="card flex-fill">
                                                            <div class="card-body p-3 text-center">
                                                                <p class="card-text f-12">
                                                                    {{ trans('main.No Data Founded') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ @$data->links() }}
                            </div>
                        </div>
                    </div>
                    @include('dashboard.employeeTarget.addModal')
                </div>
            </div>
        </div>
    </div>
    <!--end:::Main-->
@endsection




@section('js')
<script type="text/javascript">
    // var updateBtn = document.getElementById("updateBtn");
    // var addBtn = document.getElementById("addBtn");

    // var productList = [];
    // var filteredList = [];

    // if (localStorage.getItem("products") !== null) {
    //     productList = JSON.parse(localStorage.getItem("products")); //string
    //     displayProductList(productList);
    // }

    // function addProduct() {
    //     //!1- create product
    //     var product = createProduct();

    //     console.log(productList);
    //     //!2 - push product  to list ()
    //     productList.push(product);

    //     //! 3- clear inputs
    //     // clearInputs();

    //     //!4 - Set product list at localStorage
    //     //!5 - display list for user
    //     setAtLocalStorageAndDisplay();

    // }

    //! factory function
    // function createProduct() {
    //     var id = Date.now().toString();
    //     var product = {
    //         getId: function() {
    //             return id
    //         }

    //     };

    //     return product;
    // }

    // function getProductById(id) {
    //     // console.log(id);
    //     for (var i = 0; i < productList.length; i++) {
    //         if (productList[i].id == id) {
    //             console.log(productList[i]);
    //             return i;
    //         }
    //     }
    // }

    //!
    // function clearInputs() {
    //     productNameInput.value = "";
    //     productPriceInput.value = "";
    //     productCategoryInput.value = "";
    //     productDescInput.value = "";
    // }

    // productList
    // function displayProductList(list) {
    //     var cartona = `
    //         <tr class="row align-items-center justify-content-between ">
    //             <td class="col-4">
    //                 <div class="d-flex flex-column mb-5 fv-row" id="add_activity_id">
    //                     <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
    //                         <span class="required">{{ trans('main.Activity') }}</span>
    //                     </label>
    //                     <select name="activity_id[]" data-control="select2" data-dropdown-parent="#add_activity_id" class="form-select form-select-solid activity-select">
    //                         <option value="">{{ trans('main.Select') }}...</option>
    //                         <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
    //                         @foreach ($activities as $activity)
    //                             <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
    //                         @endforeach
    //                     </select>
    //                 </div>
    //             </td>
    //             <td class="col-4">
    //                 <div class="row mb-5">
    //                     <div class="col-md-12 fv-row">
    //                         <label class="required fs-5 fw-semibold mb-2">{{ trans('main.AmountTarget') }}</label>
    //                         <input type="text" class="form-control form-control-solid amount-input" placeholder="{{ trans('main.AmountTarget') }}" value="0" name="amount_target[]" />
    //                     </div>
    //                 </div>
    //             </td>
    //             <td class="col-4">
    //                 <div class="row mb-5">
    //                     <div class="col-md-12 fv-row">
    //                         <label class="required fs-5 fw-semibold mb-2">{{ trans('main.CallsTarget') }}</label>
    //                         <input type="text" class="form-control form-control-solid calls-input" placeholder="{{ trans('main.CallsTarget') }}" value="0" name="calls_target[]" />
    //                     </div>
    //                  </div>
    //             </td>
    //         </tr>
    //     `;
    //     for (var i = 0; i < list.length; i++) {
    //         cartona += `
    //             <tr>
    //                 <td>
    //                     <div class="d-flex flex-column mb-5 fv-row" id="add_activity_id">
    //                         <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
    //                             <span class="required">{{ trans('main.Activity') }}</span>
    //                         </label>
    //                         <select name="activity_id[]" data-control="select2" data-dropdown-parent="#add_activity_id" class="form-select form-select-solid activity-select">
    //                             <option value="">{{ trans('main.Select') }}...</option>
    //                             <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
    //                             @foreach ($activities as $activity)
    //                                 <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
    //                             @endforeach
    //                         </select>
    //                     </div>
    //                 </td>
    //                 <td>
    //                     <div class="row mb-5">
    //                         <div class="col-md-12 fv-row">
    //                             <label class="required fs-5 fw-semibold mb-2">{{ trans('main.AmountTarget') }}</label>
    //                             <input type="text" class="form-control form-control-solid amount-input" placeholder="{{ trans('main.AmountTarget') }}" value="0" name="amount_target[]" />
    //                         </div>
    //                     </div>
    //                 </td>
    //                 <td>
    //                     <div class="row mb-5">
    //                         <div class="col-md-12 fv-row">
    //                             <label class="required fs-5 fw-semibold mb-2">{{ trans('main.CallsTarget') }}</label>
    //                             <input type="text" class="form-control form-control-solid calls-input" placeholder="{{ trans('main.CallsTarget') }}" value="0" name="calls_target[]" />
    //                         </div>
    //                     </div>
    //                 </td>
    //                 <td class="pt-6"><button class="btn btn-danger mt-5" onclick="deleteProduct(${list[i].id})">{{ trans('main.Delete') }}</button></td>
    //             </tr>
    //         `;
    //     }
    //     document.getElementById("tBody").innerHTML = cartona;
    // }

    // //! delete (update)
    // function deleteProduct(id) {
    //     var index = getProductById(id);
    //     console.log(productList);
    //     console.log(filteredList);

    //     //!  1- productList
    //     productList.splice(index, 1);
    //     //! 2-row
    //     //! 3-local storage
    //     setAtLocalStorageAndDisplay();
    // }

    function addProduct() {
        // Define the HTML content for the new row
        var newRowHTML = `
                        <tr class="row align-items-center justify-content-between">
                            <td class="col-lg-3">
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
                                                <td class="col-lg-3">
                                                    <div class="row mb-5">
                                                        <div class="col-md-12 fv-row">
                                                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.AmountTarget') }}</label>
                                                            <input type="text" class="form-control form-control-solid amount-input" placeholder="{{ trans('main.AmountTarget') }}" value="0" name="amount_target[]" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-lg-3">
                                                    <div class="row mb-5">
                                                        <div class="col-md-12 fv-row">
                                                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.CallsTarget') }}</label>
                                                            <input type="text" class="form-control form-control-solid calls-input" placeholder="{{ trans('main.CallsTarget') }}" value="0" name="calls_target[]" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-lg-3">
                                                    <div class="row mb-5">
                                                        <div class="col-md-12 fv-row">
                                                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.ContactsTarget') }}</label>
                                                            <input type="text" class="form-control form-control-solid contacts-input" placeholder="{{ trans('main.ContactsTarget') }}" value="0" name="contacts_target[]" />
                                                        </div>
                                                    </div>
                                                </td>
                            <td class="col-lg-2">
                                <button class="btn btn-danger mt-5" onclick="deleteProduct(this)">Delete</button>
                            </td>
                        </tr>
                        <hr>
                    `;

        // Append the new row to the table body
        var tableBody = document.querySelector('#tBody');
        tableBody.insertAdjacentHTML('beforeend', newRowHTML);
    }

    function deleteProduct(button) {
        // Remove the row that contains the button
        var row = button.closest('tr');
        row.remove();
    }


    function setFormForUpdate(index) {
        // var index = 1
        //remove add btn
        addBtn.classList.replace("d-block", "d-none");
        //display update btn
        updateBtn.classList.replace("d-none", "d-block");

        productList[index];
        productNameInput.value = productList[index].name;
        productPriceInput.value = productList[index].price;
        productCategoryInput.value = productList[index].category;
        productDescInput.value = productList[index].desc;
    }

    //!regular expression regex

    //! pattern (valid mail)
    function validProductName() {
        var x = /^[A-Z][a-z]{3,8}$/;
        if (x.test(productNameInput.value) === true) {
            return true;
        } else {
            return false;
        }
    }

    function test(input) {
        console.log(input.value);
        input.value = input.value.replace(/[0-9]/g, "");
    }
</script>



<script>
    $(function() {
        updateSums();

        function updateSums() {
            var sumAmount = 0;
            var sumCalls = 0;
            var sumContacts = 0;

            $('#activity-table tbody tr').each(function() {
                var amount = parseInt($(this).find('input[name="amount_target[]"]').val()) || 0;
                var calls = parseInt($(this).find('input[name="calls_target[]"]').val()) || 0;
                var contacts = parseInt($(this).find('input[name="contacts_target[]"]').val()) || 0;

                sumAmount += amount;
                sumCalls += calls;
                sumContacts += contacts;
            });

            $('input[name="target_amount"]').val(sumAmount);
            $('input[name="target_meeting"]').val(sumCalls);
            $('input[name="target_contact"]').val(sumContacts);
        }

        $(document).on('keyup', '.amount-input', updateSums);
        $(document).on('keyup', '.calls-input', updateSums);
        $(document).on('keyup', '.contacts-input', updateSums);

    });
</script>
@endsection
