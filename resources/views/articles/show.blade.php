<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/200/135" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/200/135" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/200/135" class="d-block w-100" alt="...">
                      </div>
                    </div>
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
                    <a href="{{Route('homepage')}}" class="btn btn-outline-secondary">Torn alla home</a>
                  </div>
                  @auth
                    @if(Auth::user()->is_revaisor && !$article->is_accepted)
                    <div class="my-2">
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
    
    <x-footer />
</x-layout>