    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles_unchecked as $article)
                <div class="col-12 col-md-4 mb-4">
                    @livewire('articles-card', ['article' => $article])
                </div>
                @endforeach
            </div>
        </div>
        