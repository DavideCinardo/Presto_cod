<div>
    <button wire:click="{{$like == true ? "dislike" : "like"}}" class="heart d-flex justify-content-center"><i class="{{$like == true ? "text-danger fa-solid " : "fa-regular"}} fa-heart"></i></button>
</div>
