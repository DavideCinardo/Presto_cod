<x-layout>

    <div class="container min-vh-75">
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
                            <label class="form-check-label textRemember" for="rememberMe">{{__('ui.remember')}}</label>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4 d-flex justify-content-center">
                                    <button type="submit" class="bg-transparent border-0">
                                        <btn-custom>
                                            <ul>
                                                <li>
                                                  <a class="facebook accept">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    LOGIN
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
                                              <a href="{{route('register')}}" class="facebook ">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                {{__('ui.notRegister')}}
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