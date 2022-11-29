<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            @forelse($articles as $article)
                @foreach($article->user_like as $user)
                    @if($user->id == Auth::user()->id)
                        <div class="col-12 col-md-4 mb-4">
                            @livewire('articles-card', ['article' => $article])
                        </div>
                    @endif
                @endforeach

            @empty 
                <div class="container min-vh-100">
                    <div class="row">
                        <div class="col-12">
                            <h3>Non hai messo like a nessun annuncio.</h3>
                            <h5>Esplora i nostri annunci : </h5>
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-dark">Inseriscine uno</a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <x-footer />
</x-layout>