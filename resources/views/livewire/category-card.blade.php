<div class="container formCreate">
    <div class="row title-h justify-content-center">
        <div class="col-1 border-start border-top"></div>
        <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
            <h4>
                <span class="{{$category->icon}}"></span> 
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
    <div class="row justify-content-center mt-5">
       
        @forelse($articles as $article)
        
            <div class="col-12 col-md-4 mb-4">
                @livewire('articles-card', ['article' => $article])
            </div>
                
        @empty
            <div class="container min-vh-100 mt-5">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="categoryPrompt me-4">
                            {{__('ui.noAds')}} : <span class="{{$category->icon}}"></span> 
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
                        </h3>
                    </div>
                    <div class="col-12 mt-5">
                        <btn-custom>
                            <ul>
                                <li>
                                <a href="{{ route('articles.create') }}" class="facebook" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    {{__('ui.insert')}}
                                </a>
                                </li>
                            </ul>
                        </btn-custom>
                    </div>  

                </div>
            </div>
        @endforelse
    </div>
</div>
