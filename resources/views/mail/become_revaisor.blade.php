<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>{{__('ui.requestRevisor')}}</h1>
        <h3>{{__('ui.itsData')}} :</h3>
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
        <h4>{{__('ui.workApply')}} :</h4>
        <p>{{$whyWork}}</p>
        <h4>{{__('ui.okRevisor')}} :</h4>
        <a href="{{route('make.revaisor', compact('user'))}}">Rendi revisore</a>
    </div>
</body>
</html>