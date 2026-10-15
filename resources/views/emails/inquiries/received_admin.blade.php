<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Order / Product Enquiry</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; color: #333333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f7fa; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #2563eb; padding: 30px 20px; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 22px; font-weight: 700;">New Order / Product Enquiry 📩</h1>
                            <p style="margin: 6px 0 0 0; font-size: 14px; opacity: 0.9;">A customer has submitted an inquiry on your website</p>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <!-- Product Section -->
                                @if($inquiry->product)
                                <tr>
                                    <td colspan="2" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-bottom: 20px;">
                                        <p style="margin:0 0 4px 0; font-size: 12px; text-transform: uppercase; color: #64748b; font-weight: 700;">Inquired Product</p>
                                        <p style="margin:0; font-size: 16px; color: #0f172a; font-weight: 700;">{{ $inquiry->product->name }}</p>
                                        @if($inquiry->product->price)
                                            <p style="margin:4px 0 0 0; font-size: 14px; color: #059669; font-weight: 600;">Listed Price: ₹{{ number_format($inquiry->product->price, 2) }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr><td height="18" colspan="2"></td></tr>
                                @endif

                                <!-- Customer Details -->
                                <tr>
                                    <td width="50%" style="padding-bottom: 16px;">
                                        <p style="margin:0 0 4px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Customer Name</p>
                                        <p style="margin:0; font-size: 15px; color: #0f172a; font-weight: 600;">{{ $inquiry->name }}</p>
                                    </td>
                                    <td width="50%" style="padding-bottom: 16px;">
                                        <p style="margin:0 0 4px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Phone Number</p>
                                        <p style="margin:0; font-size: 15px; color: #0f172a; font-weight: 600;"><a href="tel:{{ $inquiry->phone }}" style="color: #2563eb; text-decoration: none;">{{ $inquiry->phone }}</a></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding-bottom: 16px;">
                                        <p style="margin:0 0 4px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Email Address</p>
                                        <p style="margin:0; font-size: 14px; color: #475569;">{{ $inquiry->email ?: 'Not provided' }}</p>
                                    </td>
                                    <td width="50%" style="padding-bottom: 16px;">
                                        <p style="margin:0 0 4px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Date & Time</p>
                                        <p style="margin:0; font-size: 14px; color: #475569;">{{ $inquiry->created_at ? $inquiry->created_at->format('d M, Y h:i A') : now()->format('d M, Y h:i A') }}</p>
                                    </td>
                                </tr>

                                @if($inquiry->message)
                                <tr>
                                    <td colspan="2" style="padding-top: 10px; padding-bottom: 20px;">
                                        <p style="margin:0 0 6px 0; font-size: 12px; text-transform: uppercase; color: #94a3b8; font-weight: 700;">Message / Address Details</p>
                                        <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 12px; font-size: 14px; line-height: 1.5; color: #334155; white-space: pre-line;">
                                            {{ $inquiry->message }}
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </table>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/admin/product_inquiries') }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; text-decoration: none; font-size: 15px; font-weight: 600; padding: 12px 28px; border-radius: 6px; text-align: center;">View All Inquiries in Admin</a>
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
