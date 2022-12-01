<div class="container-fluid">

    <div class="row justify-content-center">
        
        <div class="col-12 col-md-8">
            @if (session('articleCreated'))
                <div class="alert alert-success formCreate">
                    {{ session('articleCreated') }}
                </div>

            @endif
            
            <form wire:submit.prevent="store" class="formCreate ">
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
                            <option value="{{ $category->id }}">
                                @switch(Config::get('app.locale'))
                                    @case('it')
                                        {{$category->nameIt}}
                                        @break
                                    @case('en')
                                        {{$category->nameEn}}
                                        @break
                                    @case('es')
                                        {{$category->nameEs}}
                                        @break
                                    @default
                                @endswitch  
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">{{__('ui.photos')}}</label>
                    <input type="file" wire:model="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" id="price">
                </div>
                {{-- se c'e l'img --}}
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p class="Lbl-text">{{__('ui.photoPreview')}}</p>
                                <div class="row">
                                    @foreach($images as $key => $image)
                                        <div class="col-12 col-md-4">
                                            <div class="img-preview mb-3" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                            <btn-custom wire:click="removeImage({{$key}})" class="me-5">
                                                <ul>
                                                    <li>
                                                      <a class="facebook reject" href="#">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        {{__('ui.delete')}}
                                                      </a>
                                                    </li>
                                                </ul>
                                            </btn-custom>
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
                <div class="d-flex justify-content-center">
                    <button type="submit" class="me-5 bg-transparent border-0">
                        <btn-custom>
                            <ul>
                                <li>
                                    <a class="facebook accept text-uppercase">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    {{__('ui.insert')}}
                                    </a>
                                </li>
                            </ul>
                        </btn-custom>
                    </button>
                    <btn-custom>
                        <ul>
                            <li>
                                <a href="{{route('homepage')}}" class="facebook" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Home
                                </a>
                            </li>
                        </ul>
                    </btn-custom>
                </div>
                
            </form>
        </div>
    </div>

    @if ($errors->any())
                <div class="alert alert-danger errorLogin">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
                </div>
            @endif

</div>
