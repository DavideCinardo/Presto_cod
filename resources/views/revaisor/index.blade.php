<x-layout>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-1 border-start border-top"></div>
            <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                <h4>
                    Zona revisore
                </h4>
            </div>
            <div class="col-1 border-end border-bottom"></div>
        </div>
    </div>
    {{-- se ci sono gli annunci --}}
        @livewire('revisor-accept')
    {{-- end --}}
    <x-footer />
</x-layout>