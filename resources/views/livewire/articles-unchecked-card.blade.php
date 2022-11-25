    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles_unchecked as $article_unchecked)
            <div class="col-12 col-md-4 my-4">
                {{-- Card --}}
                <div class="card p-0 w-100">
                    <img src="https://picsum.photos/200" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>  
                            <div class="card__header-text d-flex justify-content-between w-100">
                                <div class=" text-start">
                                    <h3 class="card__title">{{$article_unchecked->title}}</h3>            
                                    <span class="card__status">{{$article_unchecked->location}}</span>
                                </div>
                                <div>
                                    <h3 class="card__title">&euro;{{$article_unchecked->price}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card__descrition mb-2 d-flex justify-content-center">
                            <div>
                                <p class="card__status">{{$article_unchecked->description}}</p>
                                <a href="{{route('article.unchecked', compact('article_unchecked'))}}" class="btn btn-outline-warning">Revisiona articolo</a>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
                @endforeach
            </div>
        </div>
        