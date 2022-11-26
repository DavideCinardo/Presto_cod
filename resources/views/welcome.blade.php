<x-layout>
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
            {{-- descrizione --}}
            <div class="col-12 col-md-4">
                <div class="description">
                    <h1>descrizione</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi incidunt deserunt autem et! Nemo quos eum ab modi quidem quasi magni explicabo possimus ipsum, enim cumque quisquam fugiat laboriosam unde!</p>
                </div>
            </div>
            {{-- form cerca --}}
            <div class="col-12 col-md-3">
                <div class="shadow-lg SearchBar d-flex flex-column-reverse">
                    <form action="{{route('articles.search')}}" method="GET" class="my-3" role="search">
                        @csrf
                        <label for="searched">Cosa cerchi?</label>
                        <input class="form-control me-2 d-inline my-2" id="searched" name="searched" type="search" placeholder="Macchina vintage, monete antiche..." aria-label="Search">
                        <button type="submit" class="btn btn-outline-warning">Cerca</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        {{-- sezione caroselli per ogni categoria --}}
            @foreach($categories as $category)
                <div class="mt-5">
                    @if(count($category->articles) > 0)
                        <div class="etichetta">
                            <h4>Ultimi articoli per la categoria : {{$category->name}}</h4>
                        </div>
                        <div class="swiper mySwiper d-flex justify-content-center mt-3">
                            <div class="swiper-wrapper">
                                @foreach($category->articles as $article)
                                    @if ($article->is_accepted)
                                        <div class="swiper-slide">
                                            <div class="card p-0 w-100">
                                                    <img src="https://picsum.photos/200" class="card__image" alt="" />
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
                                                                <a href="{{route('articles.show', compact('article'))}}" class="btn btn-outline-warning small">Scopri di più</a>
                                                            </div>
                                                        </div>
                                                    </div>     
                                            </div>
                                        </div>         
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    @endif
                </div>
            @endforeach
    </div>

    <x-footer />
</x-layout>
