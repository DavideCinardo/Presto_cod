<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                {{-- form register --}}
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" nome="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                {{--  end form register --}}
            </div>
        </div>
    </div>

</x-layout>