<div class="container-fluid">

    <div class="row justify-content-center">
        @if (session('articleCreated'))
            <div class="alert alert-success">
                {{ session('articleCreated') }}
            </div>

        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12 col-md-8">
            <form wire:submit.prevent="store" class="formCreate">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">{{__('ui.title')}}</label>
                    <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="title">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">{{__('ui.localy')}}</label>
                    <input type="text" wire:model="location" class="form-control @error('location') is-invalid @enderror" id="location">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">{{__('ui.category')}}</label>
                    <select wire:model.defer="category" id="category" class="form-control @error('category') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">{{__('ui.photo')}}</label>
                    <input type="file" wire:model="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" id="price">
                </div>
                {{-- se c'e l'img --}}
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>{{__('ui.photoPreview')}}</p>
                                <div class="row">
                                    @foreach($images as $key => $image)
                                        <div class="col">
                                            <div class="img-preview" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                            <button class="btn btn-outline-danger" wire:click="removeImage({{$key}})">{{__('ui.delete')}}</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                    @endif
                {{-- end se c'e l'img --}}
                <div class="mb-3">
                    <label for="price" class="form-label">{{__('ui.price')}}</label>
                    <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror" id="price">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">{{__('ui.description')}}</label>
                    <textarea type="text" wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-success">{{__('ui.postAds')}}</button>
                <a href="{{route('homepage')}}" class="btn btn-outline-secondary">Home</a>
                
            </form>
        </div>
    </div>

</div>
