<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            text-align: center;
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333333;
        }
        p {
            color: #666666;
        }
        .reset-code {
            font-size: 18px;
            font-weight: bold;
            color: #D53D43;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
            display: inline-block;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h2>Password Reset Code</h2>
    <p>Hello {{$userInfo->first_name . ' ' . $userInfo->last_name}},</p>

    <p>We received a request to reset your password. Use the code below to reset your password:</p>

    <div class="reset-code">
        {{$userInfo->reset_code}}
    </div>

    <p>Enter this code in the password reset page to continue with resetting your password.</p>
    <p>If you did not request a password reset, please ignore this email or contact support if you have concerns.</p>

    <p>Thanks,</p>
    <p>The Bookmark app Team</p>

    <div class="footer">
        <p>If you need assistance, please contact our support team.</p>
    </div>
</div>
</body>
</html>
