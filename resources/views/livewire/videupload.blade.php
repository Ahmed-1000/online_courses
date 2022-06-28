<div>
   

 <div class="container">
 <div class="row">

   
      @if($courses->owner_course == auth()->user()->profile->id)
        <button class="btn btn-primary" wire:click="OpenAddsection({{$courses->id}})" style="margin-left:480px;  position:absolute;  top:170px; width:140px; ">Add section</button>
     @endif
 </div>

</div>

  
 
   @include('models.section')
</div>
