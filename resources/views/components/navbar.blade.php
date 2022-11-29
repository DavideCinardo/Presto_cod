

   <div id="mainNavigation">
    <nav role="navigation">
  
      <div class="py-3 text-center border-bottom under-line" id="navLogo" >
      <a class="navbar-brand colorText p-0 ms-2 home "href="{{route('homepage')}}">
        {{-- <img src="/media/presto.png" alt="" class="invert logo-image" height="100" width="100"> --}}
        <div class="LogoSize">
          <div class="wrapperTitle">
            <div class="cardTitle">
              <h1 class="fontTitle">
                <span class="enclosedTitle">Presto</span>.it
              </h1>
            </div>
          </div>
        </div>
      </a>
      </div>
    </nav>
    <div class="navbar-expand-md" id="subNav">
      <div class="navbar-dark text-center">
        <button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
        </button>
      </div>
      <div class="text-center mt-0 collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <div class="space"></div>
        <ul class="navbar-nav mt-2 d-flex justify-content-center w-100">
          <li class="nav-item">
            <a class="nav-link active home" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('articles.create')}}">{{__('ui.postAd')}}</a>
          </li>
  
          <div class="nav-item dropdown">
  
            <a class="nav-link dropdown-toggle colorText size" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.ads')}}
            </a>
          {{-- Dropdown annunci --}}
            <ul class="dropdown-menu bg-menu mt-2">
              <a href="{{route('articles.index')}}"><li class="dropdown-item colorText colorTextDD">{{__('ui.allAds')}}</li></a>
                <hr class="line-separator">
                  @foreach($categories as $category)
                    <a href="{{route('category', compact('category'))}}">
                      <li class="dropdown-item colorTextDD">
                        
                        @switch(Config::get('app.locale'))
                            @case('it')
                                {{$category->nameIt}}
                                @break
                            @case('en')
                                {{$category->nameEn}}
                                @break
                            @case('es')
                                {{$category->nameEs}}
                                @break
                            @default
                        @endswitch  
                      </li>

                    </a>
                  @endforeach
            </ul>
          </div>
          @auth
          {{-- dropdown utente registrato --}}
          {{-- tasto per i revisori --}}
            @if (Auth::user()->is_revaisor)
                <div class="nav-item d-flex align-items-center me-4 position-relative">
                  <a href="{{route('revaisor.index')}}">
                    {{__('ui.reviewAds')}}
                  </a>
                  <span class="position-absolute top-0 start-100 translate-middle ">
                    @livewire('not-revisione-count')
                  </span>
                </div>
            @endif
            {{-- end tasto dei revisori --}}
            <div class="nav-item dropdown colorText">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.welcome')}}, {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu bg-menu">
                          <li><a class="dropdown-item colorTextDD" href="">I tuoi ordini</a></li>
                            <li><a class="dropdown-item colorTextDD" href="{{route('articles.own')}}">{{__('ui.yourAds')}}</a></li>
                            <li><a class="dropdown-item colorTextDD" href="{{route('articles.prefer')}}">{{__('ui.favourite')}}</a></li>
                            <li><a class="dropdown-item colorTextDD" href="">{{__('ui.messages')}}</a></li>
                            <li><a class="dropdown-item colorTextDD" href="">{{__('ui.contactUs')}}</a></li>
                            <li><a class="dropdown-item colorTextDD" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                            <form class="d-none" method="POST" action="{{route('logout')}}" id="form-logout">@csrf</form>
                            
                              <button type="button" class="dropdown-item colorTextDD" data-bs-toggle="modal" data-bs-target="#workModal">
                                {{__('ui.workUs')}}
                              </button>  
                            
                        </ul>
                      </div>       
             
             
             {{-- end dropdown registrato --}}
             @else
                 {{-- dropdown utente --}}
     
     
           
                     <div class="nav-item dropdown colorText size">
                         
     
                       {{-- Accedi --}}
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Login
                         </a>
     
                         {{-- Dropdown Login e Register --}}
                         <ul class="dropdown-menu bg-menu mt-3">
                             <li><a class="dropdown-item toggle-color colorTextDD" href="{{route('login')}}">Login</a></li>
                             <li><a class="dropdown-item toggle-color colorTextDD" href="{{route('register')}}">{{__('ui.register')}}</a></li>
                         </ul>
                     </div>
                 {{-- end drop down utente --}}
             @endauth
        </ul>
        {{-- tasti cambio lingua --}}
            <div class="d-flex">
              <x-_locale lang="it" />
              <x-_locale lang="en" />
              <x-_locale lang="es" />
            </div>
        {{-- end tasti cambio lingua --}}
      </div>
    </div>
  </div>
  <div class="separatore"></div>
  
  <div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('ui.reviewBecome')}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('become.revaisor')}}" method="POST">
            @csrf
            <label for="whyWork">{{__('ui.why')}}</label>
            <textarea class="form-control" name="whyWork" id="whyWork" cols="30" rows="7"></textarea>
            <div class="mt-2">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">{{__('ui.apply')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  