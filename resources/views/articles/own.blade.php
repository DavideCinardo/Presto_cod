<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @forelse($articles as $article)
                <div class="col-12 col-md-3 mb-4">
                    @livewire('articles-card', ['article' => $article])
                </div>
            @empty
                <div class="container min-vh-100">
                    <div class="row">
                        <div class="col-12">
                            <h3>{{__('ui.noYourAds')}}</h3>
                            <btn-custom>
                                <ul>
                                    <li>
                                      <a href="{{route('articles.create')}}" class="facebook">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        {{__('ui.insert')}}
                                      </a>
                                    </li>
                                </ul>
                            </btn-custom>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    {{-- footer --}}
    <x-footer />
</x-layout>