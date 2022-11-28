<div class="container formCreate">
    <div class="row justify-content-center">
        @forelse($articles as $article)
        
            <div class="col-12 col-md-4 mb-4">
                @livewire('articles-card', ['article' => $article])
            </div>
                
        @empty
            <div class="container min-vh-100">
                <div class="row">
                    <div class="col-12">
                        <h3>Non ci sono annunci per la categorie : {{ $category->name }}</h3>
                        <a href="{{ route('articles.create') }}" class="btn btn-outline-dark">Inseriscine uno</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
