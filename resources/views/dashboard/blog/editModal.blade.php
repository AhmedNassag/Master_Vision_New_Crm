<!--begin::Add Modal-->
<div class="modal fade" id="edit_modal_{{ @$item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered model-lg">
        <div class="modal-content">
            <form action="{{ route('blog.update', 'test') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                {{ method_field('patch') }}
                @csrf
                <div class="modal-header">
                    <h2>{{ trans('main.Edit') }} {{ trans('main.Blog') }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-outline ki-cross fs-1"></i></div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <!-- name -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Name') }}</label>
                                <input type="text" class="form-control form-control-solid" placeholder="{{ trans('main.Name') }}" value="{{ @$item->title, old('name') }}" name="title" />
                            </div>
                        </div>
                        <!-- description -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.Description') }}</label>
                                <textarea class="form-control form-control-solid" name="description" cols="30" rows="10" placeholder="{{ trans('main.Description') }}">{{ @$item->description, old('description') }}</textarea>
                            </div>
                        </div>
                         <!-- File -->
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-semibold mb-2">{{ trans('main.File') }}</label>
                                <input type="file" class="form-control form-control-solid" name="media" />
                                @if($item->media)
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <?php
                                            $mimeType = $item->media->file_type;
                                            $mimeParts = explode('/', $mimeType);
                                        ?>
                                        @if ($mimeParts[0] === 'image')
                                        <img src="{{ asset('attachments/blog/'.@$item->media->file_name) }}" alt="image" />
                                        @else
                                        <video  src="{{ asset('attachments/blog/'.@$item->media->file_name) }}" width="200" height="200" controls></video>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <!-- id -->
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="{{ @$item->id }}">
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
