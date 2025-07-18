<!-- resources/views/mails/welcome.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body style="background-color: #f0fdf4; font-family: Arial, sans-serif;">
<div style="max-width: 600px; margin: 40px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px #d1fae5;">
    <h1 style="color: #12815f;">Hi <b>{{ $user->name }}</b></h1>
    <h4 style="color: #059669;">Welcome to our platform!</h4>
    <hr>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
    <p>We're glad to have you with us.</p>
</div>
</body>
</html>
