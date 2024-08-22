<!--begin::Add Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" action="{{ route('support.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Add') }} {{ trans('main.Support') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <!-- name -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                {{-- <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ old('name') }}" name="title" /> --}}
                                <select class="form-control form-control-solid" name="key">
                                    <option value="faceBook">FaceBook</option>
                                    <option value="instgrame">I</option>
                                </select>
                            </div>
                        </div>
                        <!-- description -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Description') }}</label>
                                <textarea class="form-control form-control-solid" name="description" cols="30" rows="10" placeholder="{{ trans('main.Description') }}">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <!-- File -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.File') }}</label>
                                <input type="file" class="form-control form-control-solid" value="{{ old('media') }}" name="media" />
                            </div>
                        </div>

                        <!-- city_id -->
                        {{-- <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">{{ trans('main.City') }}</span>
                            </label>
                            <select name="city_id" data-control="select2" data-dropdown-parent="#add_modal" class="form-select form-select-solid">
                                <option value="">{{ trans('main.Select') }}...</option>
                                <?php $cities = \App\Models\City::get(['id','name']); ?>
                                @foreach($cities as $city)
                                    <option value="{{ @$city->id }}">{{ @$city->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
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
