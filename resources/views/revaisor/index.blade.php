<x-layout>
    <div class="container-fluid formCreate">
        <div class="row title-h justify-content-center">
            <div class="col-1 border-start border-top"></div>
            <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                <h4>
                    {{-- se ci sono annunci primo titolo altrimenti secondo --}}
                    {{$articles_unchecked ? 'Tutti gli articoli da revisionare' : 'Non ci sono articoli da revisionare'}}
                </h4>
            </div>
            <div class="col-1 border-end border-bottom"></div>
        </div>
    </div>
    {{-- se ci sono gli annunci --}}
            @livewire('revisor-accept')
    {{-- end --}}

    {{-- gli annunci revisionati dal revisore loggato --}}
        <div class="container-fluid formCreate my-5">
            <div class="row title-h justify-content-center">
                <div class="col-1 border-start border-top"></div>
                <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                    <h4>
                        {{-- se ci sono annunci primo titolo altrimenti secondo --}}
                        {{$articles_checked ? 'Tutti gli articoli revisionati da te' : 'Non ci sono articoli revisionati da te'}}
                    </h4>
                </div>
                <div class="col-1 border-end border-bottom"></div>
            </div>
        </div>
        {{-- se ci sono gli annunci --}}
                @livewire('articles-checked-card')
        {{-- end --}}
    {{-- end gli annunci revisionati dal revisore loggato --}}

    <x-footer />
</x-layout>