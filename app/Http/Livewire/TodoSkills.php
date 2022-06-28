<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\todo;

class TodoSkills extends Component
{
   public $skill;
    public function render()
    {
        return view('livewire.todo-skills',[
           'todo' => todo::where('profile_id','=',auth()->user()->profile->id)->get(),
        ]);
    }

    public function openskillsmodal(){

       $this->dispatchBrowserEvent('OpenAddskills');
    }
   public function increment(){
       

        if($this->skill){
            
             $todo = new todo();
             $todo->profile_id = auth()->user()->profile->id;
             $todo->content = $this->skill;
             $todo->save();
        }
   }
   public function remove($id){
        $todo = todo::find($id)->delete();

   }
}
