<!DOCTYPE html>
<html @if(app()->getLocale() == 'en') lang="en" dir="ltr" @else lang="ar" direction="rtl" dir="rtl" style="direction: rtl" @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        h1, h2 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
            padding: 10px;
            /* text-align: center; */
        }

        .total {
            font-weight: bold;
        }

        /* Button Styles */
        .print-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #7239ea;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .print-button:hover {
            background-color: #7239ea;
        }

        .print-button:active {
            background-color: #7239ea;
        }

        /* Print-specific styles */
        @media print {
            .no-print {
                display: none;
            }

            .receipt-container {
                width: 100%;
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    <div class="receipt-container">
        <h1>{{ trans('main.Receipt') }}</h1>
        <h2>{{ $data->reorder_reminder_number ?? '---' }} </h2>
        <p><strong>{{ trans('main.Date') }}:</strong> {{ $data->reminder_date->format('d-m-Y') }}</p>
        <p><strong>{{ trans('main.Customer') }}:</strong> {{ $data->customer ? $data->customer->name : '---' }}</p>
        <p><strong>{{ trans('main.Branch') }}:</strong> {{ $data->customer ? $data->customer->branch->name : '---' }}</p>
        <p><strong>{{ trans('main.Invoice') }}:</strong>
            <a href="@if($data->invoice) {{ route('invoice.index',$data->invoice->id) }} @endif" target="_blank" style="text-decoration:none">
                {{ $data->invoice ? $data->invoice->invoice_number : '---' }}
            </a>
        </p>
        <p><strong>{{ trans('main.Activity') }}:</strong>
            @if($data->invoice)
                {{ $data->invoice && $data->invoice->activity ? $data->invoice->activity->name : '' }} / {{ $data->invoice && $data->invoice->interest ? $data->invoice->interest->name : '' }} / {{ $data->invoice && $data->invoice->service ? $data->invoice->service->name : '' }}
            @endif
        </p>
        {{-- <p><strong>{{ trans('main.Status') }}:</strong>
            <span style="color: {{ $data->is_completed == 1 ? 'mediumseagreen' : 'red' }}">
                {{ $data->is_completed == 1 ? __('main.Completed') : __('main.Not Completed') }}
            </span>
        </p> --}}
        <table>
            <tfoot>
                <tr>
                    <td class="total text-start">{{ trans('main.Paid Amount') }}</td>
                    <td class="total" style="text-align: center">{{ $data->expected_amount ? $data->expected_amount : 0 }}</td>
                </tr>
                <tr>
                    <td class="total text-start">{{ trans('main.Invoice Total Amount') }}</td>
                    <td class="total" style="text-align: center">{{ $data->invoice && $data->invoice->total_amount ? $data->invoice->total_amount : 0 }}</td>
                </tr>
                <tr>
                    <td class="total text-start">{{ trans('main.Invoice Amount Paid') }}</td>
                    <td class="total" style="text-align: center">{{ $data->invoice && $data->invoice->amount_paid ? $data->invoice->amount_paid : 0 }}</td>
                </tr>
                <tr>
                    <td class="total text-start">{{ trans('main.Invoice Dept') }}</td>
                    <td class="total" style="text-align: center">{{ $data->invoice && $data->invoice->debt ? $data->invoice->debt : 0 }}</td>
                </tr>
            </tfoot>
        </table>
        <div class="no-print">
            <button class="print-button" onclick="window.print()">{{ trans('main.Print') }}</button>
        </div>
    </div>

</body>
</html>
