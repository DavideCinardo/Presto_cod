<div>

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
    <div class="container mt-5">
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
                <div class="col-12 col-md-4 text-start ps-2">
                  <h3>{{$article->title}}</h3>
                  <p class="text-secondary fst-italic">Categoria {{$article->category->name}}</p>
                  <p class="text-secondary fst-italic">{{$article->location}}</p>
                  <p>{{$article->description}}</p>
                  <p class="fst-italic text-secondary">{{$article->user->name}}</p>
                  <div class="col-12 col-md-6 text-start">
                    <p class="fs-1">&euro;{{$article->price}}</p>
                    <a href="{{Route('homepage')}}" class="btn btn-outline-secondary">Home</a>
                  </div>
                  @auth
                    @if(Auth::user()->is_revaisor && !$article->is_accepted)
                    <div class="my-2">
                      <button wire:click="acceptArticle" class="btn btn-success">{{__('ui.accept')}}</button>
                    </div>
                    <div>
                      <button wire:click="rejectArticle" class="btn btn-danger">{{__('ui.reject')}}</button>
                    </div>
                    @endif
                  @endauth
                </div>
            </div>
        </div>
    </div>
</div>
    