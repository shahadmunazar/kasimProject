<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Confirmation</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; color: #333333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f7fa; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #0d6efd; padding: 40px 20px; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 28px; font-weight: 700; letter-spacing: -0.5px;">Order Confirmed!</h1>
                            <p style="margin: 10px 0 0 0; font-size: 16px; opacity: 0.9;">Thank you for shopping with us.</p>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="font-size: 18px; margin-top: 0; font-weight: 600; color: #1e293b;">Hi {{ $order->customer_name }},</p>
                            <p style="font-size: 16px; line-height: 1.6; color: #475569;">We're excited to let you know that we've received your order and are currently preparing it for shipment.</p>
                            
                            <!-- Order Summary Box -->
                            <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 25px; margin: 30px 0;">
                                <h3 style="margin: 0 0 15px 0; font-size: 16px; color: #64748b; text-transform: uppercase; letter-spacing: 1px;">Order Summary</h3>
                                
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="padding-bottom: 12px; font-size: 15px; color: #475569;">Order Number:</td>
                                        <td align="right" style="padding-bottom: 12px; font-size: 15px; font-weight: 600; color: #0f172a;">#{{ $order->order_number }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 12px; font-size: 15px; color: #475569;">Payment Method:</td>
                                        <td align="right" style="padding-bottom: 12px; font-size: 15px; font-weight: 600; color: #0f172a;">{{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Online / QR' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 12px; border-top: 1px solid #cbd5e1; font-size: 16px; font-weight: 700; color: #0f172a;">Total Amount:</td>
                                        <td align="right" style="padding-top: 12px; border-top: 1px solid #cbd5e1; font-size: 18px; font-weight: 700; color: #0d6efd;">₹{{ number_format($order->amount, 2) }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Button -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/dashboard/orders') }}" style="display: inline-block; background-color: #0d6efd; color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 600; padding: 14px 35px; border-radius: 6px; text-align: center; box-shadow: 0 4px 6px rgba(13, 110, 253, 0.25);">Track Your Order</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #f1f5f9; padding: 25px; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0; font-size: 14px; color: #64748b;">Need help? Reply to this email to contact support.</p>
                            <p style="margin: 5px 0 0 0; font-size: 13px; color: #94a3b8;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
