<!-- resources/views/client/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
</head>
<body>
    <h1>Client Information</h1>
    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Mobile:</strong> {{ $customer->mobile }}</p>

    <h2>QR Code</h2>
    <div>
        {!! $qrCode !!}
    </div>

    <p>Scan this QR code to get the Customer data.</p>
</body>
</html>
