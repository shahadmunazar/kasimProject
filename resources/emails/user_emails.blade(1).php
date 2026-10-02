<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
        }
        p {
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thank you for contacting us, {{ $name }}!</h2>
        <p>Your message has been successfully received. Here are the details:</p>

        <h3>Contact Details:</h3>
        <ul>
            <li><strong>Name:</strong> {{ $name }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Mobile:</strong> {{ $mobile }}</li>
            <li><strong>Service Type:</strong> {{ $service_type }}</li>
            <li><strong>Address:</strong> {{ $address }}</li>
            <li><strong>Subject:</strong> {{ $subject }}</li>
            <li><strong>Message:</strong> {{ $message }}</li>
        </ul>

        <p>We will get back to you soon!</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
