<div class="modal fade " style="margin-left:100px;"  wire:ignore.self role="dialog" id="course_create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Course </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
           
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('dashboard/Home/profile/add_course')}}" method="post" enctype="multipart/form-data">
            @csrf

             
            <div class="form-group">
              
            </div>
            <div class="form-group" >
                <label for="">Course name</label>
                <input name="course_name" type="text" class="form-control" placeholder="Course name" >
                 <span class="text-danger">@error('course_name'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">price</label>
                <input name="price" type="number" min="200" value="200" class="form-control"  >
                <span class="text-danger">@error('price'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">Course description</label>
                <input name="description" type="text" class="form-control" placeholder="description" >
                <span class="text-danger">@error('description'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input name="image_course" type="file" class="form-control"  >
                <span class="text-danger">@error('image_course'){{ $message }} @enderror</span>
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
