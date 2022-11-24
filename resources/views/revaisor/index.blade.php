<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                {{-- se ci sono annunci primo titolo altrimenti secondo --}}
                {{$articles_unchecked ? 'Tutti gli articoli da revisionare' : 'Non ci sono articoli da revisionare'}}
            </div>
        </div>
    </div>
    {{-- se ci sono gli annunci --}}
    @if($articles_unchecked)
        @livewire('articles-unchecked-card')
    @endif

</x-layout>