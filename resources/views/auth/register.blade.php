<x-layout>

    <div class="container my-5 min-vh-100">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center formCreate">
            <div class="col-12 col-md-8">
                {{-- form register --}}
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Conferma Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password">
                        </div>
                        <button type="submit" class="btn btn-success">Registrati</button>
                        <a href="{{route('homepage')}}" class="btn btn-outline-secondary">Torna alla home</a>
                        <a class="btn btn-outline-primary" href="{{route('login')}}">Sei gia iscritto? Accedi da qui.</a>
                    </form>
                {{--  end form register --}}
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>