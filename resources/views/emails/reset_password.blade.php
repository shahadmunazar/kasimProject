<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7fa; color: #333333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f7fa; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #0d6efd; padding: 30px 20px; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">Password Reset Request</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td align="center" style="padding: 40px 30px; text-align: left;">
                            <p style="font-size: 16px; margin-top: 0; line-height: 1.6; color: #334155;">Hello <strong>{{ $userName }}</strong>,</p>
                            
                            <p style="font-size: 15px; line-height: 1.6; color: #475569;">You are receiving this email because we received a password reset request for your account. Click the button below to choose a new password:</p>
                            
                            <!-- Action Button -->
                            <div style="text-align: center; margin: 35px 0;">
                                <a href="{{ $resetUrl }}" style="background-color: #0d6efd; color: #ffffff; text-decoration: none; padding: 14px 32px; border-radius: 8px; font-size: 16px; font-weight: 600; display: inline-block; box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);">Reset Password</a>
                            </div>

                            <p style="font-size: 14px; color: #ef4444; font-weight: 600; margin: 0 0 15px 0; text-align: center;">This password reset link will expire in 60 minutes.</p>
                            
                            <p style="font-size: 14px; line-height: 1.5; color: #64748b; margin: 0;">If you did not request a password reset, no further action is required and you can safely ignore this email.</p>
                            
                            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">
                            
                            <p style="font-size: 12px; line-height: 1.5; color: #94a3b8; margin: 0;">If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
                            <p style="font-size: 12px; line-height: 1.5; color: #0d6efd; word-break: break-all; margin: 8px 0 0 0;">
                                <a href="{{ $resetUrl }}" style="color: #0d6efd;">{{ $resetUrl }}</a>
                            </p>
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
