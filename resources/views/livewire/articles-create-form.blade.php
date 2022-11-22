<div class="container-fluid">

   <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form>
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
