<div class="modal fade " style="margin-left:100px;"  wire:ignore.self role="dialog" id="post_create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new post </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
           
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('dashboard/Home/post/'.$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
           
             
            <div class="form-group">
              
            </div>
            <div class="form-group" >
                <label for="">post</label>
                <textarea class="form-control" name="post" placeholder="write post ...."></textarea>
                 <span class="text-danger">@error('post'){{ $message }} @enderror</span>
            </div>
           
            <div class="form-group">
                <label for="">File (options)</label>
                <input name="file_post" type="file" class="form-control"  >
                <span class="text-danger">@error('file_post'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">Add </button>
            </div>
        </form>

      </div>
      
    </div>
  </div>
</div>
