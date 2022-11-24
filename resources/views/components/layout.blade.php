<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/media/Presto.it (1)-PhotoRoom.png">
    <title>Document</title>

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    {{-- navbar --}}
    <x-navbar />

    {{-- messaggio di errore accesso ad area non consentita --}}
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    {{-- end messaggio di errore accesso ad area non consentita --}}
    
    <div class="min-vh-100">
        {{$slot}}
    </div>


    @livewireScripts
</body>
</html>