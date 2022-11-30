<div>

    
    <div class="container mt-5">
      {{-- messaggi di sessione flash --}}

            {{-- messaggio accetta --}}
            @if(session('accept'))
            <div class="alert alert-success">
                {{session('accept')}}
            </div>
        @endif
      {{-- end messaggio accetta --}}

      {{-- messaggio rifiuta --}}
      @if(session('reject'))
        <div class="alert alert-success">
            {{session('reject')}}
        </div>
      @endif
      {{-- end messaggio rifiuta --}}

      {{-- end messaggi di sessione flash --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  @if($article->images)
                    <div class="carousel-inner">
                      @foreach ($article->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                          <img src="{{Storage::url($image->path)}}" class="d-block w-100" alt="...">
                        </div>
                      @endforeach
                    </div>
                  @endif  
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
                <div class="col-12 col-md-4 text-start ps-2 Lbl-text">
                  <h3>{{$article->title}}</h3>
                  <p class="text-secondary fst-italic">{{__('ui.category')}} 
                    @switch(Config::get('app.locale'))
                        @case('it')
                            {{$article->category->nameIt}}
                            @break
                        @case('en')
                            {{$article->category->nameEn}}
                            @break
                        @case('es')
                            {{$article->category->nameEs}}
                            @break
                        @default
                    @endswitch
                  </p>
                  <p class="text-secondary fst-italic">{{$article->location}}</p>
                  <p>{{$article->description}}</p>
                  <p class="fst-italic text-secondary">{{$article->user->name}}</p>
                  <div class="col-12 col-md-6 text-start">
                    <p class="fs-1">&euro;{{$article->price}}</p>
                    <btn-custom>
                      <ul>
                          <li>
                            <a href="{{Route('homepage')}}" class="facebook" href="#">
                              <span></span>
                              <span></span>
                              <span></span>
                              <span></span>
                              Home
                            </a>
                          </li>
                      </ul>
                      @auth
                    @if(Auth::user()->is_revaisor && !$article->is_accepted)
                    <div class="my-2">
                      <btn-custom wire:click="acceptArticle">
                        <ul>
                            <li>
                              <a class="facebook" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                {{__('ui.accept')}}
                              </a>
                            </li>
                        </ul>
                    </btn-custom>
                    </div>
                    <div>
                      <btn-custom wire:click="rejectArticle">
                        <ul>
                            <li>
                              <a class="facebook" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                {{__('ui.reject')}}
                              </a>
                            </li>
                        </ul>
                    </btn-custom>
                    </div>
                    @endif
                  @endauth
                  </btn-custom>
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
    