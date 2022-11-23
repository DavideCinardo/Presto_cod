<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
    
          <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Annunci
          </a>
          <ul class="dropdown-menu">
            <a href="{{route('articles.index')}}"><li class="dropdown-item">Tutti Gli Annunci</li></a>
            <hr>
            @foreach($categories as $category)
            <a href="{{route('category', compact('category'))}}"><li class="dropdown-item">{{$category->name}}</li></a>
            @endforeach
          </ul>
          </div>
        </ul>
        
        @auth
        {{-- dropdown utente registrato --}}
        <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Benvenuto, {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                        <form class="d-none" method="POST" action="{{route('logout')}}" id="form-logout">@csrf</form>
                        <li><a class="dropdown-item" href="{{route('articles.create')}}">Inserisci annuncio</a></li>
                    </ul>
                </div>
    
            {{-- end dropdown registrato --}}
        @else
            {{-- dropdown utente --}}
      
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Benvenuto ospite
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                    </ul>
                </div>
            {{-- end drop down utente --}}
        @endauth
      </div>
    </div>
  </nav>