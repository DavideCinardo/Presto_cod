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
            <form wire:submit.prevent="create" class="formCreate">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="title">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Località</label>
                    <input type="text" wire:model="location" class="form-control @error('location') is-invalid @enderror" id="location">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria</label>
                    <select wire:model.defer="category" id="category" class="form-control @error('category') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror" id="price">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea type="text" wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Inserisci annuncio</button>
            </form>
        </div>
    </div>

</div>
