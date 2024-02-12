@extends('layouts.app0')


@section('content')

            <!-- validationNotify -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
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
                                <h3 class="page-title">{{ trans('main.EmployeeTarget') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted">{{ trans('main.Edit') }} {{ trans('main.EmployeeTarget') }}</li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('employeeTarget.index') }}" type="button" class="btn btn-primary me-2" id="filter_search">
                                    {{ trans('main.Back') }}
                                    <i class="fas fa-arrow-left"></i>
                                </a>
							</div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <form class="form" action="{{ route('employeeTarget.update', 'test') }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="modal-body py-10 px-lg-17">
                            <!-- <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"> -->
                                <div class="row">
                                    <!-- employee_id -->
                                    <div class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Employee') }}</span>
                                        </label>
                                        <select name="employee_id" data-control="select2" data-dropdown-parent="#edit_employee_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
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
                                                <option value="{{ $employee->id }}" {{ $employee->id == $employee_target->employee_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- month -->
                                    <div class="col-md-6 fv-row mb-5" id="month">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                            <span class="required">{{ trans('main.Month') }}</span>
                                        </label>
                                        <?php $year = date('Y'); ?>
                                        <select name="month" data-control="select2" data-dropdown-parent="#edit_month" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
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
                                            <tbody id="tBody" class="row">
                                                <tr class="col-2">
                                                    <button id="addBtn" type="button" onclick="addProduct();" class="d-block btn btn-info ">{{ trans('main.Add') }} {{ trans('main.Target') }}</button>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- target_amount -->
                                    <div id="activity_id" class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2" for="target_amount">{{ trans('main.Total Amount') }}</label>
                                        <input class="form-control form-control-solid calls-input" readonly name="target_amount" type="number" value="{{ $employee_target->target_amount }}">
                                    </div>
                                    <!-- interest_id -->
                                    <div id="interest_id" class="col-md-6 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2" for="target_meeting">{{ trans('main.Total Calls') }}</label>
                                        <input class="form-control form-control-solid calls-input" readonly name="target_meeting" type="number" value="{{ $employee_target->target_amount }}">
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <!-- id -->
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" value="{{ @$employee_target->id }}">
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
    <script type="text/javascript">
        var updateBtn = document.getElementById("updateBtn");
        var addBtn = document.getElementById("addBtn");

        var productList = [];
        var filteredList = [];

        if (localStorage.getItem("products") !== null) {
            productList = JSON.parse(localStorage.getItem("products")); //string
            displayProductList(productList);
        }

        function addProduct() {
            //!1- create product
            var product = createProduct();

            console.log(productList);
            //!2 - push product  to list ()
            productList.push(product);

            //! 3- clear inputs
            // clearInputs();

            //!4 - Set product list at localStorage
            //!5 - display list for user
            setAtLocalStorageAndDisplay();

        }

        //! factory function
        function createProduct() {
            var id = Date.now().toString();
            var product = {
                getId: function() {
                    return id
                }

            };

            return product;
        }

        function getProductById(id) {
            // console.log(id);
            for (var i = 0; i < productList.length; i++) {
                if (productList[i].id == id) {
                    console.log(productList[i]);
                    return i;
                }
            }
        }

        //!
        function clearInputs() {
            productNameInput.value = "";
            productPriceInput.value = "";
            productCategoryInput.value = "";
            productDescInput.value = "";
        }

        // productList
        function displayProductList(list) {
            var cartona = `
                @foreach ($employee_target->targets as $target)
                    <tr class="row align-items-center justify-content-between ">
                        <td class="col-4">
                            <div class="d-flex flex-column mb-5 fv-row" id="add_activity_id">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">{{ trans('main.Activity') }}</span>
                                </label>
                                <select name="activity_id[]" class="activity-select form-control">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    @foreach ($activities as $activity)
                                        <option value="{{ $activity->id }}" {{ $activity->id == $target->activity_id ? 'selected' : '' }}>
                                            {{ $activity->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="col-4">
                            <div class="row mb-5">
                                <div class="col-md-12 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">{{ trans('main.AmountTarget') }}</label>
                                    <input type="number" class="form-control form-control-solid amount-input" placeholder="{{ trans('main.AmountTarget') }}" value="{{ $target->amount_target }}" name="amount_target[]" />
                                </div>
                            </div>
                        </td>
                        <td class="col-4">
                            <div class="row mb-5">
                                <div class="col-md-12 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">{{ trans('main.CallsTarget') }}</label>
                                    <input type="text" class="form-control form-control-solid calls-input" placeholder="{{ trans('main.CallsTarget') }}" value="{{ $target->calls_target }}" name="calls_target[]" />
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            `;
            for (var i = 0; i < list.length; i++) {
                cartona += `
                    <tr>
                        <td>
                            <div class="d-flex flex-column mb-5 fv-row" id="add_activity_id">
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">{{ trans('main.Activity') }}</span>
                                </label>
                                <select name="activity_id[]" data-control="select2" data-dropdown-parent="#add_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid activity-select">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $activities = \App\Models\Activity::get(['id', 'name']); ?>
                                    @foreach ($activities as $activity)
                                        <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="row mb-5">
                                <div class="col-md-12 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">{{ trans('main.AmountTarget') }}</label>
                                    <input type="text" class="form-control form-control-solid amount-input" placeholder="{{ trans('main.AmountTarget') }}" value="0" name="amount_target[]" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row mb-5">
                                <div class="col-md-12 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">{{ trans('main.CallsTarget') }}</label>
                                    <input type="text" class="form-control form-control-solid calls-input" placeholder="{{ trans('main.CallsTarget') }}" value="0" name="calls_target[]" />
                                </div>
                            </div>
                        </td>
                        <td class="pt-6"><button class="btn btn-danger mt-5" onclick="deleteProduct(${list[i].id})">delete</button></td>
                    </tr>
                `;
            }
            document.getElementById("tBody").innerHTML = cartona;
        }

        //! delete (update)
        function deleteProduct(id) {
            var index = getProductById(id);
            console.log(productList);
            console.log(filteredList);

            //!  1- productList
            productList.splice(index, 1);
            //! 2-row
            //! 3-local storage
            setAtLocalStorageAndDisplay();
        }

        function setAtLocalStorageAndDisplay() {
            localStorage.setItem("products", JSON.stringify(productList));
            displayProductList(productList);
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
                var sumCalls  = 0;

                $('#activity-table tbody tr').each(function() {
                    var amount = parseInt($(this).find('input[name="amount_target[]"]').val()) || 0;
                    var calls = parseInt($(this).find('input[name="calls_target[]"]').val()) || 0;

                    sumAmount += amount;
                    sumCalls += calls;
                });

                $('input[name="target_amount"]').val(sumAmount);
                $('input[name="target_meeting"]').val(sumCalls);
            }


            $(document).on('keyup','.amount-input',updateSums);
            $(document).on('keyup','.calls-input',updateSums);


        });
    </script>
@endsection
