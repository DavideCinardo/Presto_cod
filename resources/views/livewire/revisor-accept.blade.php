<div>
    @if($article)
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
              @if($article->images)
              @foreach($article->images as $image)
                  <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="text-end Lbl-text me-4">
                      <p>Adulti : <span class="{{$image->adult}}"></span> </p>
                      <p>Satira : <span class="{{$image->spoof}}"></span></p>
                      <p>Medicina : <span class="{{$image->medical}}"></span></p>
                      <p>Violenza : <span class="{{$image->violence}}"></span></p>
                      <p>Contenuto ammiccante : <span class="{{$image->racy}}"></span></p>
                    </div>
                    <div>
                      <img src="{{Storage::url($image->path)}}" class="w-100" alt="...">
                    </div>
                  </div>

                @endforeach
              @endif
          </div>
          <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-6 text-end ps-2 Lbl-text">
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
              </div>             
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-start">
              <div>
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
                </btn-custom>
                @auth
                  @if(Auth::user()->is_revaisor && !$article->is_accepted)
                    <div class="my-2">
                      <btn-custom wire:click="acceptArticle">
                        <ul>
                            <li>
                              <a class="facebook accept" href="#">
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
                                <a class="facebook reject" href="#">
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
              </div>
            </div>
          </div>
              </div>
          </div>
      </div>
    @endif
    
</div>
    