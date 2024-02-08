<!--begin::Add Modal-->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('customer.importData') }}" method="POST" enctype="multipart/form-data" id="contact-add-form">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Import') }} {{ trans('main.Customers') }}</h2>
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
                                <option value="{{ $contactSource->id }}">{{ $contactSource->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- activity_id -->
                    <div id="import_activity_id" class="d-flex flex-column mb-5 fv-row">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">{{ trans('main.Activity') }}</span>
                        </label>
                        <select name="activity_id" id="activity_id" data-control="select2" data-dropdown-parent="#import_activity_id" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                            <option value="">{{ trans('main.Select') }}...</option>
                            <?php $activities = \App\Models\Activity::get(['id','name']); ?>
                            @foreach($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- contacts_file -->
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-semibold mb-2">{{ trans('main.File') }}</label>
                            <input type="file" class="form-control form-control-solid" id="excel-file" placeholder="{{ trans('main.Contacts File') }}" value="{{ old('file') }}" name="contacts_file" />
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
