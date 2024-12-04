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

            h1, h2, h3 {
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
            <h1>{{ trans('main.Invoice') }}</h1>
            <h2>{{ $data->invoice_number }} </h2>
            <p><strong>{{ trans('main.Date') }}:</strong> {{ $data->invoice_date }}</p>
            <p><strong>{{ trans('main.Customer') }}:</strong> {{ $data->customer->name }}</p>
            <p><strong>{{ trans('main.Branch') }}:</strong> {{ $data->customer->branch->name }}</p>
            <p><strong>{{ trans('main.Invoice') }}:</strong> {{ $data->invoice_number }}</p>
            <p><strong>{{ trans('main.Activity') }}:</strong>
                @if($data->invoice)
                    {{ $data->activity ? $data->activity->name : '' }} / {{ $data->interest ? $data->interest->name : '' }} / {{ $data->service ? $data->service->name : '' }}
                @endif
            </p>
            <table>
                <h3 style="text-decoration: underline;">{{ trans('main.Receipts') }}</h3>
                <thead>
                    <tr>
                        <th style="text-align: center">{{ trans('main.Reorder Reminder Number') }}</th>
                        <th style="text-align: center">{{ trans('main.Reorder Reminder Date') }}</th>
                        <th style="text-align: center">{{ trans('main.Amount') }}</th>
                        <th style="text-align: center">{{ trans('main.Created By') }}</th>
                        <th style="text-align: center">{{ trans('main.Updated By') }}</th>
                        {{-- <th style="text-align: center">{{ trans('main.Status') }}</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->recorderReminders as $reminder)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('receipt.index',$reminder->id) }}" target="_blank" style="text-decoration:none">
                                    {{ $reminder->reorder_reminder_number ?? '---' }}
                                </a>
                            </td>
                            <td class="text-center">
                                {{ $reminder->reminder_date->format('d-m-Y') }}
                            </td>
                            <td class="text-center">
                                {{ $reminder->expected_amount ?? 0 }}
                            </td>
                            <td class="text-center">
                                {{ $reminder->createdBy ? $reminder->createdBy->name : '---' }}
                            </td>
                            <td class="text-center">
                                {{ $reminder->updatedBy ? $reminder->updatedBy->name : '---' }}
                            </td>
                            {{-- <td class="text-center">
                                <span style="color: {{ $reminder->is_completed == 1 ? 'mediumseagreen' : 'red' }}">
                                    {{ $reminder->is_completed == 1 ? __('main.Completed') : __('main.Not Completed') }}
                                </span>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="no-print">
                <button class="print-button" onclick="window.print()">{{ trans('main.Print') }}</button>
            </div>
        </div>

    </body>
</html>
