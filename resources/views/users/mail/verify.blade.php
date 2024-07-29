<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Xin chào {{$userName}}</h2>
    <p>Chúc mừng bạn đã đăng ký thành công tài khoản</p>
    <p>Mời bấm xác nhận để tiếp tục sử dụng</p>
    <button>
        <a href="{{route('verifyEmail', $token)}}">Xác thực tài khoản</a>
    </button>
</body>
</html>
