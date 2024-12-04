<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Receipt Design</title>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                direction: rtl !important;
                padding: 20px;
                margin: 0;
            }
            .receipt-container {
                width: 100%;
            }
            @media(min-width:767px)
            {
                .receipt-container {
                width: 800px;
                background-color: white;
                margin: 0 auto;
                padding: 30px;
                border: 1px solid #ddd;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .header-info {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }
            }

            h2 {
                color: red;
                text-align: center;
                font-size: 26px;
                margin-top: 0;
            }


            .header-info div {
                font-size: 18px;
            }

            .field {
                margin-top: 30px;
                border-bottom: 1px dotted #000;
                padding-bottom: 5px;
            }

            .field span {
                margin-right: 10px;
                font-size: 18px;
            }

            .footer-info {
                display: flex;
                justify-content: space-between;
                margin-top: 60px;
            }

            .footer-info div {
                text-align: center;
                font-size: 18px;
            }

            .heart-design {
                position: absolute;
                bottom: 10px;
                left: 10px;
                width: 200px;
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
            <h2>إيصال إستلام نقدية</h2>
            <div class="header-info">
                <div>
                    <p>فرع: {{ $data->customer ? $data->customer->branch->name : '---' }}</p>
                </div>
                <div>
                    <p>التاريخ: {{ $data->reminder_date->format('d') }} / {{ $data->reminder_date->format('m') }} /
                        {{ $data->reminder_date->format('Y') }}</p>
                </div>
                <div>
                    <p>No. {{ $data->reorder_reminder_number ?? '---' }}</p>
                </div>
            </div>
            <div class="field">
                <span>استلمنا من السيد: {{ $data->customer ? $data->customer->name : '---' }}</span>
            </div>
            <div class="field">
                <span>مبلغ وقدره: {{ $data->expected_amount ? $data->expected_amount : 0 }}</span>
            </div>
            <div class="field">
                <span>يتبع إذن بيع رقم: {{ $data->invoice ? $data->invoice->invoice_number : '---' }}</span>
            </div>
            <div class="field">
                <span>وذلك عن: {{ $data->invoice && $data->invoice->activity ? $data->invoice->activity->name : '' }} - {{ $data->invoice && $data->invoice->interest ? $data->invoice->interest->name : '' }} - {{ $data->invoice && $data->invoice->service ? $data->invoice->service->name : '' }}</span>
            </div>
            @if($data->notes)
                <div class="field">
                    <span>ملاحظات أخري: {{ $data->notes }}</span>
                </div>
            @endif
            <div class="footer-info">
                <div>
                    <p>الختم</p>
                </div>
                <div>
                    <p>المستلم</p>
                    <p>{{ $data->updatedBy ? $data->updatedBy->name : '---' }}</p>
                </div>
            </div>
        </div>
        <div class="no-print" style="text-align: center; margin-top:10px;">
            <button class="print-button" onclick="window.print()">{{ trans('main.Print') }}</button>
        </div>

    </body>

</html>
