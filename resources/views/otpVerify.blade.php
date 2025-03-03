<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        h2 {
            color: #333;
        }
        p {
            font-size: 14px;
            color: #666;
        }
        .otp-input {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .otp-input input {
            width: 40px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .otp-input input:focus {
            border-color: #4CAF50;
            box-shadow: 0px 0px 5px rgba(76, 175, 80, 0.5);
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .resend {
            margin-top: 10px;
            font-size: 14px;
        }
        .resend a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .resend a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>OTP Verification</h2>
    <p>Enter the 6-digit OTP sent to your email.</p>

    <form id="otpForm">
        <div class="otp-input">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
        </div>
        <button type="submit" class="btn">Verify OTP</button>
    </form>

    <p class="resend">Didn't receive the code? <a href="#">Resend OTP</a></p>
</div>

</body>
</html>
