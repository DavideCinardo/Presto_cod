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
        <h1>Un utente ha chiesto di diventare revisore di annunci</h1>
        <h3>I suoi dati :</h3>
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
        <h4>Puoi renderlo tale cliccando qui :</h4>
        <a href="{{route('make.revaisor', compact('user'))}}">Rendi revisore</a>
    </div>
</body>
</html>