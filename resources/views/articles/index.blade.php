<x-layout>
    <div class="container mt-5">
        <div class="row title-h justify-content-center mb-5">
            <div class="col-1 border-start border-top"></div>
            <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                <h4>
                    {{__('ui.allAds')}}
                </h4>
            </div>
            <div class="col-1 border-end border-bottom"></div>
        </div>
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