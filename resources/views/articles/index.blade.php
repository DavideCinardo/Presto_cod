<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)
                <div class="col-12 col-md-3 mb-4">
                    @livewire('articles-card', ['article' => $article])
                </div>

            @endforeach
        </div>
    </div>
    
    <x-footer />
</x-layout>