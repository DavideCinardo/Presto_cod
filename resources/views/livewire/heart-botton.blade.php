<div>
    <button wire:click="like_menager({{$article}})" type="submit" class="heart d-flex justify-content-center align-items-center border-0">
        <i class="{{Auth::user()->articleslike->contains($article->id) ? "text-danger fa-solid " : "fa-regular"}} fa-heart fs-4"></i>
    </button>
</div>



