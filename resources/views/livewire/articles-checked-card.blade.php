<div class="container">
    {{-- messaggi di sessione --}}
        @if(session('nullRevision'))
            <div class="alert alert-success">
                {{session('nullRevision')}}
            </div>
        @endif
    {{-- end messaggi di sessione --}}
    <div class="row justify-content-around">
        @foreach ($articles as $article)
            <div class="col-12 col-md-3 my-4">
                    {{-- Card --}}
                <div class="card p-0 shadow-lg rounded-0">
                    <div class="profileCard position-relative h-100">
                        <div class="profileImg">
                            <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(300,400) : "https://picsum.photos/200"}}" class="card__image" alt="" />
                                @auth
                                    @livewire('heart-botton', ['article' => $article])
                                @endauth
                        </div>
                        <div class="profileContent d-flex justify-content-center">
                            <div class="distanza">
                                <h2 class="titleCard">{{$article->title}}
                                    <span>{{$article->location}}</span>
                                    <span>{{$article->description}}</span>
                                    <span>&euro;{{$article->price}}</span>
                                    <btn-custom>
                                        <ul>
                                            <li>
                                              <a href="{{route('articles.show', compact('article'))}}" class="facebook" href="#">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                {{__('ui.more')}}
                                              </a>
                                            </li>
                                        </ul>
                                    </btn-custom>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
        
        