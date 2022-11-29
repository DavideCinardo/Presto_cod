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

    {{-- header --}}
    <x-header />

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
                    {{session('error')}}
                </div>
            @endif
        {{-- end allert di errore --}}
        {{-- alert area non consentita --}}
            @if(session('notAccessArea'))
                <div class="alert alert-danger">
                    {{session('notAccessArea')}}
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#workModal">
                        {{__('ui.workUs')}}
                      </button>
                </div>
            @enderror
        {{-- end alert area non consentita --}}
        {{-- alert area non consentita --}}
            @if(session('accessRevaisor'))
                <div class="alert alert-warning">
                    {{session('accessRevaisor')}}
                    <a class="btn btn-outline-warning" href="{{route('login')}}">
                        Login
                    </a>
                </div>
            @enderror
        {{-- end alert area non consentita --}}
    {{-- end messaggi di successo/errore --}}
    
    <div>
        {{$slot}}
    </div>


    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</body>
</html>