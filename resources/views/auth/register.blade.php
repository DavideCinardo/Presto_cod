<x-layout>

    <div class="container my-5 min-vh-75">
        
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
                            <label for="password_confirmation" class="form-label">{{__('ui.confPass')}}</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password">
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4">

                                    <button type="submit" class="bg-transparent border-0 d-flex mx-auto">
                                        <btn-custom >
                                            <ul>
                                                <li>
                                                  <a class="facebook accept text-uppercase">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    {{__('ui.register')}}
                                                  </a>
                                                </li>
                                            </ul>
                                        </btn-custom>
                                    </button>

                                </div>
                                <div class="col-12 col-md-4">

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

                                </div>
                                <div class="col-12 col-md-4">

                                    <btn-custom>
                                        <ul>
                                            <li>
                                              <a href="{{route('login')}}" class="facebook">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                LOGIN
                                              </a>
                                            </li>
                                        </ul>
                                    </btn-custom>

                                </div>

                            </div>
                        </div>

                    </form>
                {{--  end form register --}}
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger errorLogin">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <x-footer />
</x-layout>