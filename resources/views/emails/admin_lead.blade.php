<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Lead Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 600px;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .content p {
            font-size: 14px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .content .label {
            font-weight: bold;
            color: #333;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>New Lead Submission</h2>
        </div>

        <div class="content">
            <p><span class="label">Name:</span> {{ $name }}</p>
            <p><span class="label">Email:</span> {{ $email }}</p>
            <p><span class="label">Mobile:</span> {{ $mobile }}</p>
            <p><span class="label">Service Type:</span> {{ $service_type }}</p>
            <p><span class="label">Address:</span> {{ $address }}</p>
            <p><span class="label">Subject:</span> {{ $subject }}</p>
            <p><span class="label">Message:</span></p>
            <p>{{ $message }}</p>
        </div>

        <div class="footer">
            <p>Thank you for your attention to this new lead!</p>
        </div>
    </div>

</body>
</html>
