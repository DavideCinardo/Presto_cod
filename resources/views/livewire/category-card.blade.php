<div>
    <div class="container">
        <div class="row justify-content-center">
            @forelse($articles as $article)
            <div class="col-12 col-md-4">
                {{-- Card --}}
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{Storage::url($article->cover)}}" class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="{{route('articles.show', compact('article'))}}" class="btn btn-primary">Leggi di più</a>
                    </div>
                </div>
            </div>
            @empty 
                <div>
                    <h3>Non ci sono annunci per la categorie : {{$category->name}}</h3>
                    <a href="{{route('articles.create')}}" class="btn btn-outline-primary">Inseriscine uno</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
