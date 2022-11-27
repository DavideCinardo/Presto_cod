<div>
    @forelse($article->users as $user)
        <button wire:click="{{$user->id == Auth::user()->id ? "dislike" : "like"}}" class="heart d-flex justify-content-center"><i class="{{$user->id == Auth::user()->id ? "text-danger fa-solid " : "fa-regular"}} fa-heart"></i></button>
    @empty
        <button wire:click="like" class="heart d-flex justify-content-center"><i class="fa-regular fa-heart"></i></button>
    @endforelse
</div>
