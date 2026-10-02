<!DOCTYPE html>
<html>
<head>
    <title>Contact Confirmation</title>
</head>
<body>
    <h2>Thank you for contacting us!</h2>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Mobile:</strong> {{ $mobile }}</p>
    <p><strong>Service Type:</strong> {{ $service_type }}</p>
    <p><strong>Address:</strong> {{ $address }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $message_content }}</p> {{-- ✅ Avoid using $message --}}
</body>
</html>
