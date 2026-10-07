<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Update</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; color: #333333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f7fa; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #f59e0b; padding: 30px 20px; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: 700;">Order Status Update</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="font-size: 18px; margin-top: 0; font-weight: 600; color: #1e293b;">Hello {{ $order->customer_name }},</p>
                            <p style="font-size: 16px; line-height: 1.6; color: #475569;">There is an update regarding your recent order <strong>#{{ $order->order_number }}</strong>.</p>
                            
                            <div style="background-color: #fffbeb; border-left: 4px solid #f59e0b; padding: 20px; margin: 25px 0; border-radius: 0 8px 8px 0;">
                                <p style="margin: 0 0 8px 0; font-size: 14px; color: #92400e; text-transform: uppercase; font-weight: 700;">New Status</p>
                                <p style="margin: 0; font-size: 22px; color: #b45309; font-weight: 700;">{{ strtoupper($order->status) }}</p>
                            </div>

                            @if($order->expected_delivery_date)
                            <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; padding: 20px; margin: 25px 0; border-radius: 8px; text-align: center;">
                                <p style="margin: 0 0 5px 0; font-size: 14px; color: #166534; font-weight: 600;">Expected Delivery Date</p>
                                <p style="margin: 0; font-size: 20px; color: #15803d; font-weight: 700;">{{ \Carbon\Carbon::parse($order->expected_delivery_date)->format('l, F j, Y') }}</p>
                            </div>
                            @endif

                            <!-- Button -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 30px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/dashboard/orders') }}" style="display: inline-block; background-color: #f59e0b; color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 600; padding: 14px 35px; border-radius: 6px; text-align: center;">View Order Details</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #f1f5f9; padding: 25px; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0; font-size: 13px; color: #94a3b8;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
