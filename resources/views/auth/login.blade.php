<x-layout>

    <div class="container mt-5 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                {{-- form register --}}
                    <form action="{{route('login')}}" method="POST">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                @endif
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Accedi</button>
                        <a href="{{route('homepage')}}" class="btn btn-white">Torna alla home</a>
                    </form>
                {{--  end form register --}}
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>