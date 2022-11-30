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
                        <button type="submit" class="bg-transparent border-0">
                            <btn-custom>
                                <ul>
                                    <li>
                                      <a class="facebook">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        Login
                                      </a>
                                    </li>
                                </ul>
                            </btn-custom>

                        </button>
                        <btn-custom>
                            <ul>
                                <li>
                                  <a href="{{route('homepage')}}" class="facebook">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    Home
                                  </a>
                                </li>
                            </ul>
                        </btn-custom>
                        <btn-custom>
                            <ul>
                                <li>
                                  <a href="{{route('register')}}" class="facebook">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    {{__('ui.notRegister')}}
                                  </a>
                                </li>
                            </ul>
                        </btn-custom>
                    </form>
                {{--  end form register --}}
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>