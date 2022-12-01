<div class="container">
    {{-- messaggi di sessione --}}
        @if(session('nullRevision'))
            <div class="alert alert-success">
                {{session('nullRevision')}}
            </div>
        @endif
    {{-- end messaggi di sessione --}}
    @if($articles)
        <div class="row w-100 d-flex justify-content-center mt-5">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 my-5">
                        {{-- Card --}}
                        @livewire('articles-card', ['article' => $article])
                    <div class="d-flex justify-content-center mt-3">
                        @if($article->id == $last->id)
                            <button wire:click="nullRevision({{$article->id}})" class="bg-transparent border-0">
                                <btn-custom class="mt-5">
                                    <ul>
                                        <li>
                                        <a class="facebook reject">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            {{__('ui.cancelReview')}}
                                        </a>
                                        </li>
                                    </ul>
                                </btn-custom>
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
        
        