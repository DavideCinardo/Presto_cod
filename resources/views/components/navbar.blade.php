<nav class="navbar fixed-top navbar-expand-lg p-2 mb-5">
  <div class="container-fluid">
    {{-- Logo --}}
    <div id="toggle" class="container-fluid">
      <a class="navbar-brand colorText p-0 ms-2 logo-home " href="{{route('homepage')}}"><img src="/media/Presto.it-PhotoRoom.png" alt="" class="logo" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><i class="fa-solid fa-bars toggle-color"></i></span>
        </button>
    </div>

    {{-- Links --}}
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
      <div class="d-flex justify-content-center">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

          {{-- Home --}}
          <li class="nav-item">
            <a class="nav-link active colorText size" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>

          {{-- Inserisci annuncio --}}
          <li>
            <a class="nav-link active colorText size" href="{{route('articles.create')}}">Inserisci annuncio</a>
          </li>

          {{-- Annunci --}}
          <div class="nav-item dropdown">

            <a class="nav-link dropdown-toggle colorText size" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Annunci
            </a>

          {{-- Dropdown annunci --}}
            <ul class="dropdown-menu bg-menu mt-2">
              <a href="{{route('articles.index')}}"><li class="dropdown-item colorText colorTextDD">Tutti Gli Annunci</li></a>
                <hr class="line-separator">
                  @foreach($categories as $category)
                    <a href="{{route('category', compact('category'))}}"><li class="dropdown-item colorTextDD">{{$category->name}}</li></a>
                  @endforeach
            </ul>
          </div>
      </div>
  
      @auth
      {{-- dropdown utente registrato --}}
      {{-- tasto per i revisori --}}
        @if (Auth::user()->is_revaisor)
            <div class="nav-item">
              <a href="{{route('revaisor.index')}}" class="position-relative">
                Articoli da revisionare
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
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
                      <li><a class="dropdown-item colorTextDD" href="{{route('articles.own')}}">I tuoi annunci</a></li>
                      <li><a class="dropdown-item colorTextDD" href="">Preferiti</a></li>
                      <li><a class="dropdown-item colorTextDD" href="">Messaggi</a></li>
                      <li><a class="dropdown-item colorTextDD" href="">Contattaci</a></li>
                      <li><a class="dropdown-item colorTextDD" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                      <form class="d-none" method="POST" action="{{route('logout')}}" id="form-logout">@csrf</form>
                      
                        <button type="button" class="dropdown-item colorTextDD" data-bs-toggle="modal" data-bs-target="#workModal">
                          Lavora con noi
                        </button>  
                      
                  </ul>       
      </div>
        
    
            {{-- end dropdown registrato --}}
        @else
            {{-- dropdown utente --}}


      
                <div class="nav-item dropdown colorText size me-5 d-flex">
                    

                  {{-- Accedi --}}
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Accedi
                    </a>

                    {{-- Dropdown Login e Register --}}
                    <ul class="dropdown-menu bg-menu mt-3">
                        <li><a class="dropdown-item toggle-color colorTextDD" href="{{route('login')}}">Login</a></li>
                        <li><a class="dropdown-item toggle-color colorTextDD" href="{{route('register')}}">Registrati</a></li>
                    </ul>
                </div>
            {{-- end drop down utente --}}
        @endauth
      </div>
    </div>
    
  </nav>
  <div class="separatore"></div>

  <div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Vuoi diventare un revisore?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('become.revaisor')}}" method="POST">
            @csrf
            <label for="whyWork">Dicci perchè : </label>
            <textarea class="form-control" name="whyWork" id="whyWork" cols="30" rows="7"></textarea>
            <div class="mt-2">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Invia candidatura</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>