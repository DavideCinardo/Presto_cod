<x-layout>

    <div class="container">
        <div class="row justify-content-center">
                @forelse ($articles_searched as $article)
                    <div class="col-12 col-md-3 mb-4">
                        @livewire('articles-card', ['article' => $article])
                    </div>
                    
                @empty
                    <div class="col-12">
                        <div class="alert alert-danger formCreate">
                            <p>{{__('ui.noSearch')}} : "{{$search}}"</p>
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
    
    <x-footer />
</x-layout>