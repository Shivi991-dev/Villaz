<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src="http://127.0.0.1:8000/images/img_1.jpg" alt=""  width="20px" srcset="">
    <p>Name = {{ $user['fname']}} {{ $user['lname']}}</p>
    <p>Email = {{ $user['email']}}</p>
    <h3>Click To Verify Email </h3>
    <a href="{{route('verifyEmail',['email'=>$encEmail])}}">Click to verify</a>
</body>
</html>