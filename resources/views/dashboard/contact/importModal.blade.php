<!--begin::Add Modal-->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('contact.importData') }}" method="POST" enctype="multipart/form-data" id="contact-add-form">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Import') }} {{ trans('main.Contacts') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <!-- contactSource_id -->
                    <div id="contactSource_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.ContactSource') }}</span>
                        </label>
                        <select name="contact_source_id" id="contactSource_id" data-control="select2" data-dropdown-parent="#contactSource_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $contactSources = \App\Models\ContactSource::get(['id','name']); ?>
                            @foreach($contactSources as $contactSource)
                                <option value="{{ @$contactSource->id }}">{{ @$contactSource->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- activity_id -->
                    <div id="import_activity_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="activity_id" id="importActivity" data-control="select2" data-dropdown-parent="#import_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                            @foreach($activities as $activity)
                                <option value="{{ @$activity->id }}">{{ @$activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- interest_id -->
                    <div id="import_interest_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.SubActivity') }}</span>
                        </label>
                        <select name="interest_id" id="importInterest" data-control="select2" data-dropdown-parent="#import_interest_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>

                        </select>
                    </div>
                    <!-- contacts_file -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.File') }}</label>
                            <input name="contacts_file" type="file" id="excel-file" class="form-control form-control-solid" />
                            <button type="button" class="mt-1 btn btn-primary" id="fetch-columns">{{ trans('main.Fetch Excel Columns') }}</button>
                        </div>
                    </div>
                    <div id="excel-columns-container"></div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ trans('main.Close') }}</button>
                    <button id="" type="submit" class="swal2-confirm btn fw-bold btn-primary">
                        <span class="indicator-label">{{ trans('main.Confirm') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Add Modal-->
