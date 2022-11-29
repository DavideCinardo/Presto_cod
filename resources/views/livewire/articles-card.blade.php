    {{-- Card --}}
    <div class="card p-0 w-100 position-relative shadow-lg">
        
        <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(200,300) : "https://picsum.photos/200"}}" class="card__image" alt="" />
        @auth
            @livewire('heart-botton', ['article' => $article])
        @endauth
        <div class="card__overlay">
            <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>  
                <div class="card__header-text d-flex justify-content-between w-100">
                    <div class=" text-start">
                        <h3 class="card__title">{{$article->title}}</h3>            
                        <span class="card__status">{{$article->location}}</span>
                    </div>
                    <div>
                        <h3 class="card__title">&euro;{{$article->price}}</h3>
                    </div>
                </div>
            </div>
            <div class="card__descrition mb-2 d-flex justify-content-center">
                <div>
                    <p class="card__status">{{$article->description}}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('articles.show', compact('article'))}}" class="btn btn-outline-warning me-2">{{__('ui.more')}}</a>
                        @auth
                            @if(Auth::user()->is_revaisor && !$article->is_accepted)
                                <div class="me-2">
                                    @livewire('accept-article', ['article' => $article])
                                </div>
                                <div>
                                    @livewire('reject-article', ['article' => $article])
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>     
    </div>





    {{-- new card --}}

    {{-- 
        
        <div class="profileCard">
              <div class="profileImg">
                  <img class="cardImg" src="https://picsum.photos/300"/>
              </div>
              <div class="profileContent">
                  <h2 class="titleCard">Title
                      <span>Location</span>
                      <span>Description</span>
                      <span>Price</span>
                      <span><a href="" class="btn btn-warning">Vai all'articolo</a></span>
                  </h2>
              </div>
          </div>

        --}}