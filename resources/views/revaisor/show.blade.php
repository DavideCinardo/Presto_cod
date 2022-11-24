<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($articles as $article)
                <div class="col-12 col-md-8">
                    <h1>{{$article->title}}</h1>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="{{route('revaisor.accept_article', ['article' => $article])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Accetta</button>
                </form>

            </div>
            <div class="col-12 col-md-6">
                <form action="{{route('revaisor.reject_article', ['article' => $article])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>