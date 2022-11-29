<x-layout>
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
                  <h3 class="description">{{$article->title}}</h3>
                  <p class="text-white fst-italic">Categoria {{$article->category->name}}</p>
                  <p class="text-white fst-italic">{{$article->location}}</p>
                  <p class="text-white">{{$article->description}}</p>
                  <p class="fst-italic text-white">{{$article->user->name}}</p>
                  <div class="description col-12 col-md-6 text-start">
                    <p class="fs-1">&euro;{{$article->price}}</p>
                    <btn-custom>
                      <ul>
                          <li>
                            <a href="{{route('homepage')}}" class="facebook">
                              <span></span>
                              <span></span>
                              <span></span>
                              <span></span>
                              Home
                            </a>
                          </li>
                      </ul>
                  </btn-custom>
                  </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer />
</x-layout>