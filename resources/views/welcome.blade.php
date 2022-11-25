<x-layout>
    
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                @endif
            </ul>
            
            <div class="row justify-content-center">
                @foreach($lastArticles as $lastArticle)
                <div class="col-12 col-md-4">
                    <div class="card OurCards">
                        <img src="{{Storage::url($lastArticle->cover)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$lastArticle->title}}</h5>
                            <p class="card-text">{{$lastArticle->description}}</p>
                            <p class="card-text">{{$lastArticle->created_at}}</p>
                            <p class="card-text">Prezzo:{{$lastArticle->price}}</p>
                            
                            
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                
                
                @endforeach
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3 min-vh-100">
                <div class="SearchBar d-flex flex-column-reverse">
                    <form class=" my-3" role="search">
                      <label for="search">Cosa cherchi?</label>
                      <input class="form-control me-2 d-inline" name="search" type="search" placeholder="Macchina vintage, monete antiche..." aria-label="Search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>

                  </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
</x-layout>