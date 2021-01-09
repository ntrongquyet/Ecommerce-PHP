<!DOCTYPE html>
<html>

<head>
    <title>ItsolutionStuff.com</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    @if(isset($details['username']))
    <span>Vui lòng click vào <a href="{{$details['link']}}">đây</a> để kích hoạt tài khoản</span>
    @endif

    @if(isset($details['code']))
    <h3>Mã reset tài khoản của bạn: {{ $details['code'] }}</h3>
    <span>Vui lòng click vào <a href="{{$details['link']}}">đây</a> reset tài khoản</span>
    @endif
    <p>Thank you</p>

</body>

</html>
