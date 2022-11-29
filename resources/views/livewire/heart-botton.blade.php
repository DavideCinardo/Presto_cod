<div>
    <button wire:click="like_menager({{$article_id}})" type="submit" class="heart d-flex justify-content-center">
        <i class="{{Auth::user()->articleslike->contains($article_id) ? "text-danger fa-solid " : "fa-regular"}} fa-heart"></i>
    </button>
</div>



