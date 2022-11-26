<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Complimenti {{$user->name}}!</h1>
    <h4>Ora sei un revisore</h4>
    <p>Clicca qui per iniziare a revisionare gli articoli in attesa.</p>
    <a href="{{route('revaisor.index')}}">Accedi</a>
    
</body>
</html>