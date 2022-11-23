<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{Storage::url($article->cover)}}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/200/135" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/200/135" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6 text-end ps-2">
                    <h3>{{$article->title}}</h3>
                    <p class="text-secondary fst-italic">Categoria {{$article->category->name}}</p>
                    <p class="text-secondary fst-italic">{{$article->location}}</p>
                    <p>{{$article->description}}</p>
                    <p class="fst-italic text-secondary">{{$article->user->name}}</p>
            </div>
            <div class="col-12 col-md-6 text-start">
                    <p class="fs-1">&euro;{{$article->price}}</p>
            </div>
        </div>
    </div>

</x-layout>