<x-layout>

    <div class="container">
        <div class="row justify-content-center">
                @forelse ($articles_searched as $article)
                    <div class="col-12 col-md-4">
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
                @empty
                    <div class="col-12">
                        <div class="alert alert-danger">
                            <p>Non ci sono annunci relativi alla tua ricerca : "{{$search}}"</p>
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
    
    <x-footer />
</x-layout>