<x-layout>

    {{-- Video di sfondo --}}
    <div class="container-fluid p-0 position-relative">
        <video src="/media/VideoHeader.mp4" type="video/mp4" muted autoplay loop class="videofullscreen borderVideo"></video>
        <div class="videoBox position-absolute"></div>
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
                                    <button type="submit" class="bg-transparent border-0">
                                        <btn-custom>
                                            <ul>
                                                <li>
                                                  <a class="facebook">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    {{__('ui.searchBtn')}}
                                                  </a>
                                                </li>
                                            </ul>
                                        </btn-custom>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>


   
    </div>
    
    <div class="container">
        {{-- sezione caroselli per ogni categoria --}}
            @foreach($categories as $category)
                @if(count($category->articles) > 0)
                    @foreach($category->articles as $article)
                        @if($article->is_accepted)
                            <div class="row title-h mt-5 justify-content-center">
                                <div class="col-1 border-start border-top"></div>
                                <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                                    <h4 class="text-center">{{__('ui.latestaAd')}} : <span class="{{$category->icon}}"></span> 
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
                        @endif
                        @break
                    @endforeach
                    @if(count($category->articles->filter(function($article){
                        return $article->is_accepted;
                    })))
                        <div class="row w-100 swiper mySwiper d-flex justify-content-center mt-5">
                            <div class="swiper-wrapper">
                                @foreach($category->articles as $article)
                                    @if ($article->is_accepted)
                                        <div class="col-12 col-md-4 swiper-slide">
                                            @livewire('articles-card', ['article' => $article])
                                        </div>         
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    @endif
                
                @endif   
            @endforeach
    </div>

    <x-footer />
</x-layout>