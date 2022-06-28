<div class="modal edit-profile" wire:ignore.self role="dialog" role="dialog" id="update_pro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('dashboard/Home/profile/update/'.auth()->user()->profile->id)}}" method="post" enctype="multipart/form-data">
            @csrf

             
            <div class="form-group">
              
            </div>
            <div class="form-group" >
                <label for="">User name</label>
                <input name="user_update" type="text" class="form-control" placeholder="user name" >
                 <span class="text-danger">@error('user_update'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">Email address</label>
                <input name="email_update" type="email" class="form-control" placeholder="Email address" >
                <span class="text-danger">@error('email_update'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input name="image_update" type="file" class="form-control"  >
                <span class="text-danger">@error('image_update'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
               <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">save change</button>
            </div>
        </form>

      </div>
      
    </div>
  </div>
</div>
