<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>

<div style="display: flex; flex-direction: column; align-items: center">
    <div>
        <h1 style="color: #0f0;">Привет <span style="color: #f00;">{{$name}}</span></h1>
        <h1 style="color: #0f0;">Твой пароль <span style="color: #f00;">{{$password}}</span></h1>
    </div>
    <div>
        <img src="{{asset('images/send.jpeg')}}" alt="img">
    </div>
</div>
</body>
</html>
