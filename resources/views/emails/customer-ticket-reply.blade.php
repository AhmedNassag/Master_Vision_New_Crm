<!DOCTYPE html>
<html>
<head>
    <title>Your Ticket Has A New Reply</title>
</head>
<body>
    <h1>Hello,</h1>
    <p>Your Ticket Has A New Reply:</p>
    <p><strong>Ticket Type:</strong>{{ $ticket->ticket_type }}</p>
    <p><strong>Ticket Description:</strong>{{ $ticket->description }}</p>
    <p><strong>Ticket Status:</strong>{{ $ticket->status }}</p>
    <p><strong>Ticket Activity:</strong>{{ $ticket->activity->name }}</p>
    <p><strong>Ticket Interest:</strong>{{ $ticket->subActivity->name }}</p>
    <p><strong>Ticket Reply:</strong>{{ $reply }}</p>
    <p>Thank you!</p>
</body>
</html>
