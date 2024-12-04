<!--begin::Add Modal-->
<div class="modal fade" id="edit_modal_1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('whatsapp-business.update', 'test') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                {{ method_field('patch') }}
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Edit') }} {{ trans('main.Whatsapp Business Messages Service') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <!--whatsapp_business_phone_number_id-->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.whatsapp_business_phone_number_id') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.whatsapp_business_phone_number_id') }}" value="{{ @$item->whatsapp_business_phone_number_id, old('whatsapp_business_phone_number_id') }}" name="whatsapp_business_phone_number_id" />
                            </div>
                        </div>
                        <!--whatsapp_business_access_token-->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.whatsapp_business_access_token') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.whatsapp_business_access_token') }}" value="{{ @$item->whatsapp_business_access_token, old('whatsapp_business_access_token') }}" name="whatsapp_business_access_token" />
                            </div>
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
