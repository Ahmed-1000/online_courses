<div>
   <input type="text" wire:model="skill" class="form-control" placeholder="Add skills...">
   <button wire:click="increment" class="btn btn-primary mt-4">Add</button>
   <br/>
    {{$skill}}
   <div class="container">
         @foreach($todo as $todos)
             <div class="justify-content-crnter" style="display:inline;  padding:3px; background-color:gray;  border-radius:20px;"> {{$todos->content}}</div>
             <a  style="cursor:pointer;" wire:click="remove({{$todos->id}})">remove</a>
         @endforeach
   </div>
</div>
