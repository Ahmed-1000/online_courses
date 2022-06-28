<div class="modal fade addsection" wire:ignore.self role="dialog" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Section</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="save">
             <input type="hidden" wire:model="cid">
            
            <div class="form-group" >
                <label for="">section name</label>
                <input type="text" class="form-control" placeholder="section name" wire:model="sections_names">
                <span class="text-danger">@error('sections_names') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">section description</label>
                <input type="text" class="form-control" placeholder="section description" wire:model="sections_descriptions">
                <span class="text-danger">@error('sections_descriptions') {{ $message }} @enderror</span>
            </div>
           
            <div class="form-group">
               <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
