<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md8">

                {{-- form cerca --}}
                <div class="shadow-lg d-flex flex-column-reverse">
                    <form action="{{route('articles.search')}}" method="GET" class="my-3" role="search">
                        @csrf
                        <div class="container SearchBar">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-3 text-center">
                                    <label for="searched">Cosa cerchi?</label>
                                </div>
                                <div class="col-12 col-md-4 text-center">
                                    <input class="form-control me-2 d-inline my-2" id="searched" name="searched" type="search" placeholder="Macchina vintage, monete antiche..." aria-label="Search">
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <button type="submit" class="btn btn-outline-warning">Cerca</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            {{-- carosello --}}
            <div class="col-12 col-md-5">

                <div id="carouselExampleControls" class="carouselPosition carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/300/200" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/300/200" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/300/200" class="d-block w-100" alt="...">
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
            </div>
        </div>
    </div>
    
    <div class="container">
        {{-- sezione caroselli per ogni categoria --}}
            @foreach($categories as $category)
                <div class="mt-5">
                    @if(count($category->articles) > 0)
                        @foreach($category->articles as $article)
                            @if($article->is_accepted)
                                <div class="etichetta">
                                    <h4>Ultimi articoli per la categoria : {{$category->name}}</h4>
                                </div>
                                @break
                            @endif
                        @endforeach
                        <div class="swiper mySwiper d-flex justify-content-center mt-3">
                            <div class="swiper-wrapper">
                                @foreach($category->articles as $article)
                                    @if ($article->is_accepted)
                                        <div class="swiper-slide">
                                            @livewire('articles-card', ['article' => $article])
                                        </div>         
                                    @endif
                                @endforeach
                            </div>
                            {{-- <div class="swiper-pagination"></div> --}}
                        </div>
                    @endif
                </div>
            @endforeach
    </div>

    <x-footer />
</x-layout>
