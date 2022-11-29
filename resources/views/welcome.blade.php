<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">  
                    <form action="{{route('articles.search')}}" method="GET" class="my-3" role="search">
                        @csrf
                        <div class="container SearchBar">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12 col-md-3 text-center">
                                    <label class="Lbl-text" for="searched">{{__('ui.search')}}</label>
                                </div>
                                <div class="col-12 col-md-4 text-center">
                                    <input class="form-control me-2 d-inline my-2" id="searched" name="searched" type="search" placeholder="Macchina vintage, monete antiche..." aria-label="Search">
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <button type="submit" class="btn Btn-text">{{__('ui.searchBtn')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <div class="container-fluid">
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
    
    <div class="container-fluid">
        {{-- sezione caroselli per ogni categoria --}}
            @foreach($categories as $category)
                <div class="Sez-Articoli">
                    @if(count($category->articles) > 0)
                        @foreach($category->articles as $article)
                            @if($article->is_accepted)
                                <div class="etichetta">
                                    <h4>Ultimi articoli per la categoria : 
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
                                    </h4>
                                </div>
                                @break
                            @endif
                        @endforeach
                        <div class="swiper mySwiper d-flex justify-content-center mt-5">
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
