<div class="container formCreate">
    <div class="row justify-content-center">
        @forelse($articles as $article)
            <div class="col-12 col-md-4">
                {{-- Card --}}
                <div class="card  OurCards">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{ Storage::url($article->cover) }}" class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                            <p class="card-text">{{ $article->created_at }}</p>
                            <p class="card-text">Prezzo: {{ $article->price }}</p>
                        <a href="{{ route('articles.show', compact('article')) }}" class="btn btn-primary">Leggi di
                            più</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="container min-vh-100">
                <div class="row">
                    <div class="col-12">
                        <h3>Non ci sono annunci per la categorie : {{ $category->name }}</h3>
                        <a href="{{ route('articles.create') }}" class="btn btn-outline-primary">Inseriscine uno</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
