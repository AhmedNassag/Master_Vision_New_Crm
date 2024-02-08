<!--begin::Add Modal-->
<div class="modal fade" id="edit_modal_{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('city.update', 'test') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                {{ method_field('patch') }}
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Edit') }} {{ trans('main.City') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ $item->name, old('name') }}" name="name" />
                            </div>
                        </div>

                        <!-- country_id -->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">{{ trans('main.Country') }}</span>
                            </label>
                            <select name="country_id" data-control="select2" data-dropdown-parent="#edit_modal_{{ $item->id }}" data-placeholder="{{ trans('main.Select') }}..." class="form-select form-select-solid">
                                <option value="">{{ trans('main.Select') }}...</option>
                                <?php $countries = \App\Models\Country::get(['id','name']); ?>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id == $item->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- id -->
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="{{ $item->id }}">
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
