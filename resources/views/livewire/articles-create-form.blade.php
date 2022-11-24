<div class="container my-5">
  
  <div class="row justify-content-center">
    @if (session('articleCreated'))
    
    <div class="alert alert-success">
      {{session('articleCreated')}}
    </div>
    @endif
    <div class="col-12 col-md-8">
      <form wire:submit.prevent="create" enctype="multipart/form-data">
        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                @endif
        @csrf
          <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" wire:model="title" class="form-control" id="title">          
          </div>
          <div class="mb-3">
              <label for="location" class="form-label">Località</label>
              <input type="text" wire:model="location" class="form-control" id="location">          
          </div>
          <div class="mb-3">
              <label for="category" class="form-label">Categoria</label>
              <select wire:model.defer="category" id="category" class="form-control">
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach  
              </select>         
          </div>
          <div class="mb-3">
              <label for="cover" class="form-label">Immagine</label>
              <input type="file" wire:model="cover" class="form-control" id="cover">          
          </div>
          <div class="mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number" wire:model="price" class="form-control" id="price">          
          </div>
          <div class="mb-3">
              <label for="description" class="form-label">Descrizione</label>
              <textarea type="text" wire:model="description" class="form-control" id="description" rows="8"></textarea>         
          </div>        
          <button type="submit" class="btn btn-primary">Inserisci annuncio</button>
      </form>
    </div>
  </div>
  
</div>
