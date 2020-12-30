<!DOCTYPE html>
<html>

<head>
    <title>ItsolutionStuff.com</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    @if(isset($details['link']))
    <span>Vui lòng click vào <a href="{{$details['link']}}">đây</a> để kích hoạt tài khoản</span>
    @endif

    @if(isset($details['newpassword']))
    <h2>{{ $details['newpassword'] }}</h2>
    @endif
    <p>Thank you</p>

</body>

</html>
