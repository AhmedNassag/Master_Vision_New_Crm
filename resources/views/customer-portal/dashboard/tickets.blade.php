@extends('customer-portal.layout')



@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ trans('main.Support Tickets') }}</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{ trans('main.Support Tickets You Added') }}</span>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                    <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th class="text-center">{{ trans('main.Id') }}</th>
                            <th class="text-center">{{ trans('main.Customer Name') }}</th>
                            <th class="text-center">{{ trans('main.Ticket Type') }}</th>
                            <th class="text-center">{{ trans('main.Status') }}</th>
                            <th class="text-center">{{ trans('main.Created At') }}</th>
                            <th class="text-center min-w-70px">{{ trans('main.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @if($data->count() > 0)
                            @foreach ($data as $key=>$item)
                                <tr>
                                    <td class="text-center">
                                        TK_{{ $item->id }}
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $item->customer->name }}</a>
                                    </td>
                                    <td class="text-center">
                                        @if($item->ticket_type == 'Technical Issue')
                                            {{ trans('main.Technical Issue') }}
                                        @elseif($item->ticket_type == 'Inquiry')
                                            {{ trans('main.Inquiry') }}
                                        @else
                                            {{ trans('main.Request') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 'Pending')
                                            {{ trans('main.Pending') }}
                                        @elseif($item->status == 'Open')
                                            {{ trans('main.Open') }}
                                        @elseif($item->status == 'In-Progress')
                                            {{ trans('main.In-Progress') }}
                                        @else
                                            {{ trans('main.Resolved') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $item->created_at->format('Y-m-d') }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('customer.tickets.show', $item->id) }}" class="btn btn-sm btn-light-primary btn-flex btn-center btn-active-primary " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            {{ trans('main.Details') }}
                                        </a>
                                    </td>
                                </tr>
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
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    
@endsection
