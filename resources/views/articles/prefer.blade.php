<x-layout>
    <div class="container mt-5">
        <div class="row title-h justify-content-center mb-5">
            <div class="col-1 border-start border-top"></div>
            <div class="col-8 Lbl-text justify-content-center d-flex align-items-center">
                <h4>
                    {{__('ui.favourite')}}
                </h4>
            </div>
            <div class="col-1 border-end border-bottom"></div>
        </div>
        <div class="row justify-content-center">
            @forelse($articles as $article)
                @foreach($article->user_like as $user)
                    @if($user->id == Auth::user()->id)
                        <div class="col-12 col-md-3 mb-4">
                            @livewire('articles-card', ['article' => $article])
                        </div>
                    @endif
                @endforeach

            @empty 
                <div class="container min-vh-100">
                    <div class="row">
                        <div class="col-12">
                            <h3>{{__('ui.noLike')}}</h3>
                            <h5>{{__('ui.explore')}} : </h5>
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-dark">Inseriscine uno</a>
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

    <x-footer />
</x-layout>