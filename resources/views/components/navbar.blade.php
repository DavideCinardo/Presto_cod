<nav class="navbar fixed-top navbar-expand-lg p-2">
    <div class="container-fluid">
      <div id="toggle" class="container-fluid">
        <a class="navbar-brand colorText p-0 ms-2 w-25 logo-home " href="{{route('homepage')}}"><img src="/media/Presto.it-PhotoRoom.png" alt="" class="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><i class="fa-solid fa-bars toggle-color"></i></span>
        </button>
    </div>
      <div class="collapse navbar-collapse justify-content-between d-flex" id="navbarSupportedContent">
        <div class="d-flex justify-content-center">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active colorText size" aria-current="page" href="">Contattaci</a>
            </li>
        </div>
    
          <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle colorText size" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Annunci
          </a>
          <ul class="dropdown-menu bg-menu my-3">
            <a href="{{route('articles.index')}}"><li class="dropdown-item colorText colorTextDD">Tutti Gli Annunci</li></a>
            <hr>
            @foreach($categories as $category)
            <a href="{{route('category', compact('category'))}}"><li class="dropdown-item colorTextDD">{{$category->name}}</li></a>
            @endforeach
          </ul>
          </div>
        </ul>

        
        @auth
        {{-- dropdown utente registrato --}}
        {{-- tasto per i revisori --}}
          @if (Auth::user()->is_revaisor)
              <div class="nav-item">
                <a href="{{route('revaisor.index')}}" class="position-relative">
                  Articdiv da revisionare
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pillbg-danger">
                    {{App\Models\Article::toBeRevaisonedCount()}}
                  </span>
                </a>
              </div>
          @endif
        {{-- end tasto dei revisori --}}
        <div class="nav-item dropdown colorText">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Benvenuto, {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu bg-menu">
                      <li><a class="dropdown-item colorTextDD" href="">I tuoi ordini</a></li>
                        <li><a class="dropdown-item colorTextDD" href="">I tuoi annunci</a></li>
                        <li><a class="dropdown-item colorTextDD" href="">Preferiti</a></li>
                        <li><a class="dropdown-item colorTextDD" href="">Messaggi</a></li>
                        <li><a class="dropdown-item colorTextDD" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                        <form class="d-none" method="POST" action="{{route('logout')}}" id="form-logout">@csrf</form>
                        <li>
                          <a class="dropdown-item colorTextDD" href="{{route('articles.create')}}">Inserisci annuncio</a>
                        </li>
                        <div class="dropdown-item colorTextDD">
                          <a class="nav-link" href="{{route('become.revaisor')}}">Lavora con noi</a>
                        </div>
                    </ul>
        </div>
    
            {{-- end dropdown registrato --}}
        @else
            {{-- dropdown utente --}}
      
                <div class="nav-item dropdown colorText size">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Benvenuto ospite
                    </a>
                    <ul class="dropdown-menu bg-menu">
                        <li><a class="dropdown-item toggle-color colorTextDD" href="{{route('login')}}">Login</a></li>
                        <li><a class="dropdown-item toggle-color colorTextDD" href="{{route('register')}}">Register</a></li>
                    </ul>
                </div>
            {{-- end drop down utente --}}
        @endauth
        <div>
          <form action="{{route('articles.search')}}" method="GET">
            <input name="searched" class="form-control" type="search" placeholder="Cosa vuoi cercare?">
            <button class="btn btn-outline-success" type="submit">Cerca</button>

          </form>
        </div>
      </div>
    </div>
  </nav>