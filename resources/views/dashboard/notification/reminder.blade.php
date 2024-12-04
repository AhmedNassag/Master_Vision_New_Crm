@extends('layouts.app0')
@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">{{ trans('main.Data List') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('home') }}" class="text-muted text-hover-primary">{{ trans('main.Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ trans('main.Reminders') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
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
                        <div class="flex-lg-row-fluid ms-lg-15">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#not_completed">{{ trans('main.not_completed_reorder_reminders') }} <span class="badge badge-circle badge-danger">{{ $data->where('is_completed',0)->count() }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#is_completed">{{ trans('main.completed_reorder_reminders') }} <span class="badge badge-circle badge-success">{{ $data->where('is_completed',1)->count() }}</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="not_completed" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">#</th>
                                                <th class="text-center">{{ trans('main.Serial Number') }}</th>
                                                <th class="text-center">{{ trans('main.Customer') }}</th>
                                                <th class="text-center">{{ trans('main.Invoice Number') }}</th>
                                                <th class="text-center">{{ trans('main.Reminder Date') }}</th>
                                                <th class="text-center">{{ trans('main.Amount') }}</th>
                                                <th class="text-center">{{ trans('main.Status') }}</th>
                                                {{-- <th class="text-center">{{ trans('main.Notes') }}</th> --}}
                                                <th class="text-center">{{ trans('main.Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if($data->count() > 0)
                                                @php $i = 1; @endphp
                                                @foreach ($data->where('is_completed',0) as $key=>$item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ @$i }}
                                                        </td>
                                                        <td class="text-center">
                                                                {{ @$item->reorder_reminder_number }}
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('customer.show', $item->customer->id) }}" class="text-gray-800 text-hover-primary mb-1">
                                                                {{ @$item->customer->name }}
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                                {{ @$item->invoice->invoice_number }}
                                                        </td>
                                                        <td class="text-center">{{ @$item->reminder_date->toDateString() }}</td>
                                                        <td class="text-center">{{ @$item->expected_amount }}</td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" onclick="confirmStatusChange('{{ route('reminder.changeStatus', $item->id) }}', '{{ $item->id }}')">
                                                                <div class="btn ripple btn-purple-gradient" id='swal-success-{{ $item->id }}'>
                                                                    @if (!@$item->is_completed)
                                                                        <span class="label text-success text-center">
                                                                            {{ app()->getLocale() == 'ar' ? 'جديد' : 'New' }}
                                                                        </span>
                                                                    @else
                                                                        <span class="label text-danger text-center">
                                                                            {{ app()->getLocale() == 'ar' ? 'تم التحصيل' : 'Remindered' }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        </td>
                                                        {{-- <td class="text-center">{{ @$item->notes }}</td> --}}
                                                        <td class="text-center">
                                                            @can('عرض الإيصالات')
                                                                <a type="button" class="btn btn-sm btn-edit btn-info btn-block" href="{{ route('receipt.index',$item->id) }}" target="_blank">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    @php $i++; @endphp
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th class="text-center" colspan="10">
                                                        <div class="col mb-3 d-flex">
                                                            <div class="card flex-fill">
                                                                <div class="card-body p-3 text-center">
                                                                    <p class="card-text f-12">{{ trans('main.No Data Founded') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ @$data->links() }}
                            </div>
                            <div class="tab-pane fade" id="is_completed" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                                        <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="text-center">#</th>
                                                <th class="text-center">{{ trans('main.Serial Number') }}</th>
                                                <th class="text-center">{{ trans('main.Customer') }}</th>
                                                <th class="text-center">{{ trans('main.Invoice Number') }}</th>
                                                <th class="text-center">{{ trans('main.Reminder Date') }}</th>
                                                <th class="text-center">{{ trans('main.Amount') }}</th>
                                                <th class="text-center">{{ trans('main.Status') }}</th>
                                                {{-- <th class="text-center">{{ trans('main.Notes') }}</th> --}}
                                                <th class="text-center">{{ trans('main.Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            @if($data->count() > 0)
                                                @php $i = 1; @endphp
                                                @foreach ($data->where('is_completed',1) as $key=>$item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ @$i }}
                                                        </td>
                                                        <td class="text-center">
                                                                {{ @$item->reorder_reminder_number }}
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('customer.show', $item->customer->id) }}" class="text-gray-800 text-hover-primary mb-1">
                                                                {{ @$item->customer->name }}
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                                {{ @$item->invoice->invoice_number }}
                                                        </td>
                                                        <td class="text-center">{{ @$item->reminder_date->toDateString() }}</td>
                                                        <td class="text-center">{{ @$item->expected_amount }}</td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" onclick="confirmStatusChange('{{ route('reminder.changeStatus', $item->id) }}', '{{ $item->id }}')">
                                                                <div class="btn ripple btn-purple-gradient" id='swal-success-{{ $item->id }}'>
                                                                    @if (!@$item->is_completed)
                                                                        <span class="label text-success text-center">
                                                                            {{ app()->getLocale() == 'ar' ? 'لم يتم التحصيل' : 'New' }}
                                                                        </span>
                                                                    @else
                                                                        <span class="label text-danger text-center">
                                                                            {{ app()->getLocale() == 'ar' ? 'تم التحصيل' : 'Remindered' }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        </td>
                                                        {{-- <td class="text-center">{{ @$item->notes }}</td> --}}
                                                        <td class="text-center">
                                                            @can('عرض الإيصالات')
                                                                <a type="button" class="btn btn-sm btn-edit btn-info btn-block" href="{{ route('receipt.index',$item->id) }}" target="_blank">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    @php $i++; @endphp
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th class="text-center" colspan="10">
                                                        <div class="col mb-3 d-flex">
                                                            <div class="card flex-fill">
                                                                <div class="card-body p-3 text-center">
                                                                    <p class="card-text f-12">{{ trans('main.No Data Founded') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ @$data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end:::Main-->
@endsection


{{-- Success Toast --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                title: "نجاح",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @elseif (session('error'))
            Swal.fire({
                title: "فشل",
                text: "{{ session('error') }}",
                icon: "error"
            });
        @endif
    });


    function confirmStatusChange(url, itemId) {
        Swal.fire({
            title: "{{ app()->getLocale() == 'ar' ? 'هل أنت متأكد؟' : 'Are you sure?' }}",
            text: "{{ app()->getLocale() == 'ar' ? 'هل تريد تغيير حالة هذا العنصر؟' : 'Do you want to change the status of this item?' }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#17C653',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{ app()->getLocale() == 'ar' ? 'نعم، قم بالتغيير' : 'Yes, change it!' }}",
            cancelButtonText: "{{ app()->getLocale() == 'ar' ? 'إلغاء' : 'Cancel' }}"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }


//     function confirmStatusChange(url, itemId) {
//     Swal.fire({
//         title: "{{ app()->getLocale() == 'ar' ? 'هل أنت متأكد؟' : 'Are you sure?' }}",
//         text: "{{ app()->getLocale() == 'ar' ? 'هل تريد تغيير حالة هذا العنصر؟' : 'Do you want تغيير حالة هذا العنصر؟' }}",
//         icon: 'warning',
//         input: 'text',
//         inputPlaceholder: "{{ app()->getLocale() == 'ar' ? 'أدخل رقم الايصال' : 'Enter the receipt number' }}",
//         showCancelButton: true,
//         confirmButtonColor: '#17C653',
//         cancelButtonColor: '#d33',
//         confirmButtonText: "{{ app()->getLocale() == 'ar' ? 'نعم، قم بالتغيير' : 'Yes, change it!' }}",
//         cancelButtonText: "{{ app()->getLocale() == 'ar' ? 'إلغاء' : 'Cancel' }}",
//         preConfirm: (receiptnumber) => {
//             if (!receiptnumber) {
//                 Swal.showValidationMessage("{{ app()->getLocale() == 'ar' ? 'الرجاء إدخال رقم الايصال' : 'Please enter the receipt number' }}");
//             }
//             return receiptnumber;
//         }
//     }).then((result) => {
//         if (result.isConfirmed && result.value) {
            
//             $.ajax({
//                 url: url,
//                 method: 'GET',  
//                 data: {
//                     id: itemId,  
//                     receiptnumber: result.value,  
//                     _token: '{{ csrf_token() }}'  
//                 },
//                 success: function(response) {
//                     Swal.fire({
//                         title: "تم التغيير بنجاح",
//                         text: response.message,
//                         icon: "success"
//                     }).then(() => {
//                         window.location.reload(); 
//                     });
//                 },
//                 error: function(xhr) {
//                     Swal.fire({
//                         title: "خطأ",
//                         text: xhr.responseText,
//                         icon: "error"
//                     });
//                 }
//             });
//         }
//     });
// }

</script>



