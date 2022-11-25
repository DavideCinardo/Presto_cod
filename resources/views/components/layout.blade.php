<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/media/Presto.it (1)-PhotoRoom.png">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <title>Document</title>

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    {{-- navbar --}}
    <x-navbar />

    {{-- messaggi di successo/errore --}}
        {{-- allert di successo --}}
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
        {{-- end allert di successo --}}

        {{-- allert di errore --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('erroe')}}
                </div>
            @endif
        {{-- end allert di errore --}}
    {{-- end messaggi di successo/errore --}}
        
    {{-- end messaggio di errore accesso ad area non consentita --}}
    
    <div class="min-vh-100 formCreate">
        {{$slot}}
    </div>


    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</body>
</html>