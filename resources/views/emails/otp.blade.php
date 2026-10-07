<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your OTP Code</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; color: #333333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f7fa; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #0d6efd; padding: 30px 20px; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">Login Verification</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td align="center" style="padding: 40px 30px;">
                            <p style="font-size: 16px; margin-top: 0; line-height: 1.6; color: #475569;">You requested a One-Time Password (OTP) to securely access your account. Please use the verification code below:</p>
                            
                            <!-- OTP Box -->
                            <div style="background-color: #f1f5f9; border: 2px dashed #cbd5e1; border-radius: 8px; padding: 25px; margin: 30px 0; display: inline-block;">
                                <h2 style="margin: 0; font-size: 36px; font-weight: 700; color: #0d6efd; letter-spacing: 8px;">{{ $otp }}</h2>
                            </div>

                            <p style="font-size: 15px; color: #ef4444; font-weight: 600; margin: 0 0 20px 0;">This code will expire in 10 minutes.</p>
                            
                            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">
                            
                            <p style="font-size: 13px; line-height: 1.5; color: #94a3b8; margin: 0; text-align: left;">If you did not request this OTP, it is safe to ignore this email. Someone may have typed your email address by mistake.</p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #f8fafc; padding: 20px; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0; font-size: 13px; color: #94a3b8;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
