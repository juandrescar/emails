<!DOCTYPE html>
<html>
<head>
    <title>{{$mail->subject}}</title>
</head>
<body>
    <h1>{{$mail->user->name}}</h1>
    <p>{{$mail->message}}</p>
</body>
</html>