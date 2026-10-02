<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submitted - Confirmation</title>
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
        <p>We have successfully received your message and our team will get back to you as soon as possible.</p>
        
        <h3>Here’s a summary of your submission:</h3>
        <ul>
            <li><strong>Name:</strong> {{ $name }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Mobile:</strong> {{ $mobile }}</li>
            <li><strong>Service Type:</strong> {{ $service_type }}</li>
            <li><strong>Address:</strong> {{ $address }}</li>
            <li><strong>Subject:</strong> {{ $subject }}</li>
            <li><strong>Message:</strong> {{ $message }}</li>
        </ul>

        <p>If you need to make any changes or have any further questions, please don't hesitate to reach out.</p>

        <p>Thank you for your time, and we look forward to connecting with you!</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
