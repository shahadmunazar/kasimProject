<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Order Alert</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; color: #333333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f7fa; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #10b981; padding: 30px 20px; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: 700;">New Order Received! 🛍️</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 16px; line-height: 1.6; color: #475569; margin-top:0;">You have just received a new order. Here are the details:</p>
                            
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
                                <tr>
                                    <td width="50%" style="padding-bottom: 20px;">
                                        <p style="margin:0 0 5px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Order ID</p>
                                        <p style="margin:0; font-size: 16px; color: #0f172a; font-weight: 600;">#{{ $order->order_number }}</p>
                                    </td>
                                    <td width="50%" style="padding-bottom: 20px;">
                                        <p style="margin:0 0 5px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Total Amount</p>
                                        <p style="margin:0; font-size: 16px; color: #10b981; font-weight: 700;">₹{{ number_format($order->amount, 2) }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding-bottom: 20px;">
                                        <p style="margin:0 0 5px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Customer Name</p>
                                        <p style="margin:0; font-size: 15px; color: #0f172a;">{{ $order->customer_name }}</p>
                                    </td>
                                    <td width="50%" style="padding-bottom: 20px;">
                                        <p style="margin:0 0 5px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Payment Method</p>
                                        <p style="margin:0; font-size: 15px; color: #0f172a;">{{ $order->payment_method === 'cod' ? 'COD' : 'QR Code' }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-bottom: 20px;">
                                        <p style="margin:0 0 5px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Contact Details</p>
                                        <p style="margin:0 0 2px 0; font-size: 14px; color: #475569;">Email: {{ $order->email ?? 'N/A' }}</p>
                                        <p style="margin:0; font-size: 14px; color: #475569;">Phone: {{ $order->mobile ?? 'N/A' }}</p>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 15px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/admin/orders') }}" style="display: inline-block; background-color: #1e293b; color: #ffffff; text-decoration: none; font-size: 15px; font-weight: 600; padding: 12px 30px; border-radius: 6px; text-align: center;">View in Admin Panel</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
