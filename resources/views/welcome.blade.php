<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-12 col-md-3">
                <div class="SearchBar d-flex flex-column-reverse">
                    <form class="my-3" role="search">
                        <label for="search">Cosa cherchi?</label>
                        <input class="form-control me-2 d-inline my-2" name="search" type="search"
                            placeholder="Macchina vintage, monete antiche..." aria-label="Search">
                            <label for="category">In quale categoria?</label>
                        <input class="form-control me-2 my-2" name="category" type="search" placeholder="Categoria" aria-label="Search">
                        <label for="place">Dove?</label>
                        <input class="form-control me-2 my-2" name="place" type="search" placeholder="Luogo" aria-label="Search">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container BoxWelcomeCards">
        <div class="row justify-content-center">
            @foreach ($lastArticles as $lastArticle)
                <div class="col-12 col-md-4">
                    <div class="card OurCards">
                        <img src="{{ Storage::url($lastArticle->cover) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lastArticle->title }}</h5>
                            <p class="card-text">{{ $lastArticle->description }}</p>
                            <p class="card-text">{{ $lastArticle->created_at }}</p>
                            <p class="card-text">Prezzo: {{ $lastArticle->price }}</p>
                            <a href="#" class="btn btn-primary">Scopri di più</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-footer />
</x-layout>
