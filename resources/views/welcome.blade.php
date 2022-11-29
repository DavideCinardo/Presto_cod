<x-layout>


    <div class="container-fluid p-0">
        <video src="/media/VideoHeader.mp4" type="video/mp4" muted autoplay loop class="videofullscreen"></video>
    </div>


    <div class="container-fluid mt-5">
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
                                    <input class="form-control rounded-0 me-2 d-inline my-2" id="searched" name="searched" type="search" placeholder="Macchina vintage, monete antiche..." aria-label="Search">
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <btn-custom>
                                        <ul>
                                            <li>
                                              <a class="facebook" href="#">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                {{__('ui.searchBtn')}}
                                              </a>
                                            </li>
                                        </ul>
                                    </btn-custom>
                                </div>
                            </div>
                        </div>
                    </form>
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
                            <div class="container-fluid formCreate mt-0 mb-5">
                                <div class="row title-h justify-content-center">
                                    <div class="col-1 border-start border-top"></div>
                                    <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
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
                                    <div class="col-1 border-end border-bottom"></div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <div class="swiper mySwiper d-flex justify-content-center mt-5">
                            <div class="swiper-wrapper d-flex justify-content-center">
                                @foreach($category->articles as $article)
                                    @if ($article->is_accepted)
                                        <div class="swiper-slide">
                                            @livewire('articles-card', ['article' => $article])
                                        </div>         
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    {{-- @elseif(count($category->orderBy('id', 'DESC')->first()->articles) == 0) 
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-1 border-start border-top"></div>
                                <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">Non ci sono annunci al momento</div>
                                <div class="col-1 border-end border-bottom"></div>
                            </div>
                        </div>  --}}
                    @endif
                </div>     
            @endforeach
    </div>

    <x-footer />
</x-layout>

{{-- <btn-custom>
    <ul>
        <li>
          <a class="facebook" href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Inserisci
          </a>
        </li>
    </ul>
</btn-custom> --}}
