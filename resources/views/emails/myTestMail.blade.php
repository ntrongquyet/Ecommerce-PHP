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

    @if(isset($details['reset']))
    <span>Vui lòng click vào <a href="{{$details['link']}}">đây</a> để reset tài khoản</span>
    @endif
    <p>Thank you</p>

</body>

</html>
