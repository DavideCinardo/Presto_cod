<x-layout>

    <div class="container mt-5 min-vh-100">
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
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">{{__('ui.remember')}}</label>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                        <a href="{{route('homepage')}}" class="btn btn-outline-secondary">Home</a>
                        <a class="btn btn-outline-primary" href="{{route('register')}}">{{__('ui.notRegister')}}</a>
                    </form>
                {{--  end form register --}}
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>