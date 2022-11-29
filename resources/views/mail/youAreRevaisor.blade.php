<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{__('ui.compliments')}} {{$user->name}}!</h1>
    <h4>{{__('ui.youAreRevisor')}}</h4>
    <p>{{__('ui.clickRevisor')}}</p>
    <a href="{{route('revaisor.index')}}">Login</a>
    
</body>
</html>