<!DOCTYPE html>
<html>
<head>
    <title>Join Our Todo Application</title>
</head>
<body>
    <h1>Welcome to Our Todo Application</h1>
    <p>Dear {{ $name }},</p>
    <p>You have been invited to join our Todo application. Click the link below to register and start managing your tasks:</p>
    <a href="{{ $invitationUrl }}">Join Now</a>
    <p>Best regards,<br>The Todo App Team</p>
</body>
</html>