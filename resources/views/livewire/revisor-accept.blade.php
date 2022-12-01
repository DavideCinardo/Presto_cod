<div>
  {{-- revisor not --}}
    {{-- titolo article unchecked --}}
      <div class="container-fluid formCreate mt-0 mb-5">
          <div class="row title-h justify-content-center">
              <div class="col-1 border-start border-top"></div>
              <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                  <h4>
                      {{-- se ci sono annunci primo titolo altrimenti secondo --}}
                      {{$articles_unchecked ? 'Tutti gli articoli da revisionare' : 'Non ci sono articoli da revisionare'}}
                  </h4>
              </div>
              <div class="col-1 border-end border-bottom"></div>
          </div>
      </div>
    {{-- end titolo article unchecked --}}

    {{-- card article unchecked --}}
      @if($articles_unchecked)
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
              @if($articles_unchecked->images)
                @foreach($articles_unchecked->images as $image)
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                      <div class="text-end Lbl-text me-4">
                        <p>{{__('ui.adults')}} : <span class="{{$image->adult}}"></span> </p>
                        <p>{{__('ui.spoof')}} : <span class="{{$image->spoof}}"></span></p>
                        <p>{{__('ui.medical')}} : <span class="{{$image->medical}}"></span></p>
                        <p>{{__('ui.violence')}} : <span class="{{$image->violence}}"></span></p>
                        <p>{{__('ui.racy')}} : <span class="{{$image->racy}}"></span></p>
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
                <p class="text-secondary fst-italic">{{__('ui.category')}} : <span class="{{$article->category->icon}}"></span> 
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
                <p class="fs-1">&euro;{{$article->price}}</p>            
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
    {{-- end article unchecked --}}
    
  {{-- end revisor not --}}

  {{-- artice ckeched --}}


      {{-- titoli article checked --}}
          <div class="container-fluid formCreate my-5">
            <div class="row title-h justify-content-center">
                <div class="col-1 border-start border-top"></div>
                <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                    <h4>
                        {{-- se ci sono annunci primo titolo altrimenti secondo --}}
                        {{$articles_checked ? 'Tutti gli articoli revisionati da te' : 'Non ci sono articoli revisionati da te'}}
                    </h4>
                </div>
                <div class="col-1 border-end border-bottom"></div>
            </div>
          </div>
      {{-- end titoli article checked --}}

      {{-- card checked article --}}
        <div class="container">
          {{-- messaggi di sessione --}}
              @if(session('nullRevision'))
                  <div class="alert alert-success">
                      {{session('nullRevision')}}
                  </div>
              @endif
          {{-- end messaggi di sessione --}}
          @if($articles_checked)
              <div class="row w-100 d-flex justify-content-center mt-5">
                  @foreach ($articles_checked as $article)
                      <div class="col-12 col-md-4 my-5">
                              {{-- Card --}}
                              @livewire('articles-card', ['article' => $article])
                          <div class="d-flex justify-content-center mt-3">
                              @if($last && $article->id == $last->id)
                                  <button wire:click="nullRevision({{$article->id}})" class="bg-transparent border-0">
                                      <btn-custom class="mt-5">
                                          <ul>
                                              <li>
                                              <a class="facebook reject">
                                                  <span></span>
                                                  <span></span>
                                                  <span></span>
                                                  <span></span>
                                                  {{__('ui.cancelReview')}}
                                              </a>
                                              </li>
                                          </ul>
                                      </btn-custom>
                                  </button>
                              @endif
                          </div>
                      </div>
                  @endforeach
              </div>
          @endif
        </div>
      {{-- end card checked article --}}


  {{-- end artice ckeched --}}
    
</div>
    