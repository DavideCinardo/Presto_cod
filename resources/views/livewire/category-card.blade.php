<div class="container formCreate">
    <div class="row justify-content-center">
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
