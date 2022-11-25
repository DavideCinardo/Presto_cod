<div class="container">
    <div class="row justify-content-center">
        @foreach ($articles_checked as $article_checked)
            <div class="col-12 col-md-4">
                {{-- Card --}}
                <div class="card my-5 OurCards">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{Storage::url($article_checked->cover)}}" class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article_checked->title }}</h5>
                            <p class="card-text">{{ $article_checked->description }}</p>
                            <p class="card-text">{{ $article_checked->created_at }}</p>
                            <p class="card-text">Prezzo: {{ $article_checked->price }}</p>
                        @if($last_checked->id == $article_checked->id)
                            <form action="{{route('revaisor.null_revision', compact('article_checked'))}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Annulla ultima revisione</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
