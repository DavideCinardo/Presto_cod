    {{-- Card --}}
    <div class="card p-0 w-100 position-relative">
        
        <img src="https://picsum.photos/200" class="card__image" alt="" />
        @auth
            @forelse($article->users as $user)
                @if($user->id == Auth::user()->id)
                    <form action="{{route('article.dislike', compact('article'))}}" method="POST">
                        @csrf
                        <button type="submit"class="heart d-flex justify-content-center"><i class="fa-solid text-danger fa-heart"></i></button>
                    </form>
                @else
                    <form action="{{route('article.like', compact('article'))}}" method="POST">
                        @csrf
                        <button type="submit"class="heart d-flex justify-content-center"><i class="fa-regular fa-heart"></i></button>
                    </form>
                @endif
            @empty
                <form action="{{route('article.like', compact('article'))}}" method="POST">
                    @csrf
                    <button type="submit"class="heart d-flex justify-content-center"><i class="fa-regular fa-heart"></i></button>
                </form>
            @endforelse
        @endauth
        <div class="card__overlay">
            <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>  
                <div class="card__header-text d-flex justify-content-between w-100">
                    <div class=" text-start">
                        <h3 class="card__title">{{$article->title}}</h3>            
                        <span class="card__status">{{$article->location}}</span>
                    </div>
                    <div>
                        <h3 class="card__title">&euro;{{$article->price}}</h3>
                    </div>
                </div>
            </div>
            <div class="card__descrition mb-2 d-flex justify-content-center">
                <div>
                    <p class="card__status">{{$article->description}}</p>
                    <a href="{{route('articles.show', compact('article'))}}" class="btn btn-outline-warning small">Scopri di più</a>
                </div>
            </div>
        </div>     
    </div>