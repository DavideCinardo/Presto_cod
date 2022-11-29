<div class="container">
    {{-- messaggi di sessione --}}
        @if(session('nullRevision'))
            <div class="alert alert-success">
                {{session('nullRevision')}}
            </div>
        @endif
    {{-- end messaggi di sessione --}}
    <div class="row justify-content-center">
        @foreach ($articles_checked as $article_checked)
            <div class="col-12 col-md-4 my-4">
                {{-- Card --}}
                <div class="card p-0 w-100">
                    <img src="{{!$article_checked->images()->get()->isEmpty() ? $article_checked->images()->first()->getUrl(300,400) : "https://picsum.photos/200"}}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>  
                            <div class="card__header-text d-flex justify-content-between w-100">
                                <div class=" text-start">
                                    <h3 class="card__title">{{$article_checked->title}}</h3>            
                                    <span class="card__status">{{$article_checked->location}}</span>
                                </div>
                                <div>
                                    <h3 class="card__title">&euro;{{$article_checked->price}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card__descrition mb-2 d-flex justify-content-center">
                            <div>
                                <p class="card__status">{{$article_checked->description}}</p>
                                @if($last_checked->id == $article_checked->id)
                                    @livewire('dismiss-revision', ['article' => $last_checked])
                                @endif
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        @endforeach
    </div>
</div>
        
        