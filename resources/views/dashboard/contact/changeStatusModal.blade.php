<!--begin::Modal-->
<div class="modal fade" id="changeStatus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('contact.changeStatus') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Change Status') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- status -->
                    <div id="status" class="col-md-12 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Status') }}</span>
                        </label>
                        <select id="status1" name="status" data-control="select2" data-dropdown-parent="#status" class="form-select form-select-solid" required>
                            <option value="contacted">{{ trans('main.Contacted') }}</option>
                            <option value="qualified">{{ trans('main.Qualified') }}</option>
                            <option value="converted">{{ trans('main.Converted') }}</option>
                        </select>
                    </div>
                    <div class="form-group" id="invoice-fields" style="display: none;">
                        <!-- invoice_number -->
                        @php
                            $invoice_number = \App\Models\Invoice::generateInvoiceNumber();
                        @endphp
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="invoice_number">{{ trans('main.Invoice Number') }}:</label>
                            <input type="text" class="form-control" id="invoice_number" name="invoice[invoice_number]" value="{{ $invoice_number }}" readonly>
                        </div>
                        <!-- invoice_date -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="invoice_date">{{ trans('main.Invoice Date') }}:</label>
                            <input type="date" class="form-control" id="invoice_date" name="invoice[invoice_date]">
                        </div>
                        <!-- total_amount -->
                        <div class="col-md-12 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for="total_amount">{{ trans('main.Total Amount') }}:</label>
                            <input type="number" step="0.01" class="form-control" id="total_amount" name="invoice[total_amount]">
                        </div>
                        <!-- amount_paid -->
                        <div class="col-md-12 fv-row d-none">
                            <label class="fs-5 fw-semibold mb-2" for="amount_paid">{{ trans('main.Amount Paid') }}:</label>
                            <input type="number" step="0.01" class="form-control" id="amount_paid" name="invoice[amount_paid]" value="0">
                        </div>
                        <!-- debt (Calculated field) -->
                        <div class="col-md-12 fv-row d-none">
                            <label class="fs-5 fw-semibold mb-2" for="debt">{{ trans('main.Dept') }}:</label>
                            <input type="number" step="0.01" class="form-control" id="debt" name="invoice[debt]" readonly>
                        </div>

                        {{--  --}}
                        @if(request()->root() == 'http://new-crm.com' || request()->root() == 'http://new-crm.com/public' ||/* request()->root() == 'https://dev.ourcrm.app' || request()->root() == 'https://dev.ourcrm.app/public' ||*/ request()->root() == 'https://nationalegypt.ourcrm.app' || request()->root() == 'https://nationalegypt.ourcrm.app/public')
                            <!-- email -->
                            <div class="col-md-12 fv-row">
                                <label class="fs-5 fw-semibold mb-2" for="debt">{{ trans('main.Email') }}:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <!-- package_id -->
                            <div id="package_id" class="form-group">
                                <label class="fs-5 fw-semibold mb-2" for="package_id">{{ trans('main.Package') }}:</label>
                                <select name="package_id" id="package_id_select" class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    @if($packages && count($packages) > 0)
                                        @foreach($packages as $package)
                                            <option value="{{ $package['id'] }}">{{ $package['title'] }}</option>
                                        @endforeach
                                    @else
                                        <option value="">{{ trans('main.No packages available') }}</option>
                                    @endif
                                </select>
                            </div>

                            <!-- program_id -->
                            <div id="program_id" class="form-group">
                                <label class="fs-5 fw-semibold mb-2" for="program_id">{{ trans('main.Program') }}:</label>
                                <select name="program_id" id="program_id_select" class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                </select>
                            </div>

                            <!-- package_name -->
                            <input type="hidden" id="package_name" name="package_name">

                            <!-- Add jQuery if not already included -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    $('#package_id_select').change(function() {
                                        var packageId = $(this).val();

                                        $('#program_id_select').empty().append('<option value="">{{ trans('main.Select') }}...</option>');

                                        if(packageId) {
                                            $.ajax({
                                                url: 'https://nbenewcopy.nationalegypt.com/api/programs/' + packageId, // API URL
                                                type: 'GET',
                                                success: function(response) {
                                                    if (response && response.data) {
                                                        $.each(response.data, function(index, program) {
                                                            $('#program_id_select').append('<option value="' + program.id + '">' + program.Main_Title + '</option>');
                                                        });
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error fetching programs:', error);
                                                }
                                            });
                                        }
                                    });

                                    $('#package_id_select').change(function() {
                                        var packageName = $('#package_id_select option:selected').text();
                                        $('#package_name').val(packageName);
                                    });

                                    $('#program_id_select').change(function() {
                                        var programName = $('#program_id_select option:selected').text();
                                        $('#program_name').val(programName);
                                    });
                                });
                            </script>
                        @endif
                       {{--  --}}

                        <!-- description -->
                        <div class="form-group">
                            <label class="fs-5 fw-semibold mb-2" for="description">{{ trans('main.Description') }}:</label>
                            <textarea class="form-control" id="description" name="invoice[description]" rows="3"></textarea>
                        </div>

                        <!-- activity_id -->
                        <div class="form-group">
                            <label>{{ trans('main.Basic Activity') }}:</label>
                            <input class="form-control disabled" disabled value="{{ @$item->activity->name ?? '' }}" readonly>
                        </div>

                        <!-- sub_activity_id -->
                        <div class="form-group">
                            <label>{{ trans('main.Basic SubActivity') }}:</label>
                            <input class="form-control disabled" disabled value="{{ @$item->subActivity->name ?? '' }}" readonly>
                        </div>

                        <!-- invoice[activity_id] -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row" id="invoice_activity_id">
                                {{-- <input class="form-control form-control-solid" type="text" name="invoice[activity_id]" value="{{ @$item->activity_id }}" /> --}}
                                <label class="fs-5 fw-semibold mb-2" for="invoice[activity_id]">{{ trans('main.Activity') }}:</label>
                                <select name="invoice[activity_id]" data-control="select2" data-dropdown-parent="#invoice_activity_id" class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $invoice_activities = \App\Models\Activity::/*where('id',@$item->activity_id)->*/get(['id','name']); ?>
                                    @foreach($invoice_activities as $activity)
                                        <option value="{{ @$activity->id }}" {{ @$activity->id == @$item->activity_id ? 'selected' : '' }}>{{ @$activity->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- invoice[interest_id] -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row" id="invoice_interest_id">
                                {{-- <input class="form-control form-control-solid" type="text" name="invoice[interest_id]" value="{{ @$item->interest_id }}" /> --}}
                                <label class="fs-5 fw-semibold mb-2" for="invoice[interest_id]">{{ trans('main.SubActivity') }}:</label>
                                <select name="invoice[interest_id]" data-control="select2" data-dropdown-parent="#invoice_interest_id" class="form-select form-select-solid">
                                    <option value="">{{ trans('main.Select') }}...</option>
                                    <?php $invoice_interests = \App\Models\SubActivity::/*where('id',@$item->interest_id)->*/orderBy('id', 'desc')->get(['id','name']); ?>
                                    @foreach($invoice_interests as $interest)
                                        <option value="{{ @$interest->id }}" {{ @$interest->id == @$item->interest_id ? 'selected' : '' }}>{{ @$interest->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- service_id -->
                        <div id="service_id" class="form-group">
                            <label class="fs-5 fw-semibold mb-2" for="service_id">{{ trans('main.Service') }}:</label>
                            <select name="invoice[service_id]" id="service_id" data-control="select2" data-dropdown-parent="#service_id" class="form-select form-select-solid">
                                <option value="">{{ trans('main.Select') }}...</option>
                                <?php $services = \App\Models\Service::/*where('interest_id',@$item->subActivity->id)->*/orderBy('id', 'desc')->get(['id','name']); ?>
                                @foreach($services as $service)
                                    <option value="{{ @$service->id }}">{{ @$service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- contact_id -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <input class="form-control form-control-solid" type="hidden" name="contact_id" value="{{ @$item->id }}">
                            </div>
                        </div>
                        <!-- Status -->
                        <div id="status_invoice" class="col-md-12 fv-row" style="display: none;">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">{{ trans('main.Status') }}</label>
                            <select id="status" name="invoice[status]" data-control="select2" data-dropdown-parent="#status_invoice" class="form-select form-select-solid" required>
                                <option value="draft">{{ trans('main.Draft') }}</option>
                                <option value="sent">{{ trans('main.Sent') }}</option>
                                <option selected value="paid">{{ trans('main.Paid') }}</option>
                                <option value="void">{{ trans('main.Void') }}</option>
                            </select>
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
<!--end::Modal-->
