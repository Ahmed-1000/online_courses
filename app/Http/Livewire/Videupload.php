<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\section;
use App\Models\video;
use App\Models\course;
use  Illuminate\Support\Facades\Auth;


class Videupload extends Component
{
   use WithFileUploads;

   public $sections_names, $sections_descriptions;
   public $video_up, $video_title;
   public $steps = 0;
   public $cid;
   
    public function render()
    {          
        
         $course = course::where('id','=',auth()->user()->profile->id)->get()->first();
        return view('livewire.videupload',[
             
              'sections' => section::orderBy('id')->get(),
              'courses' => course::select("id")->where('owner_course', auth()->user()->profile->id)->firstOrFail(),
              'videos' => video::where('profile_id','=',auth()->user()->profile->id)->get(),
        ]);
    }
   
   
    public function OpenAddsection($id){
         $courseId = course::find($id);
           $this->cid = $courseId->id;
        $this->dispatchBrowserEvent('OpenAddsection',[
                   'id' => $id
               ]);
    }
   public function save(){
         $cid = $this->cid;
         $this->validate([
           'sections_names' => 'required',
           'sections_descriptions' => 'required',
        ]);
          
        $upd = course::find($cid);
         
         $save = section::insert([
               'profile_id' => auth()->user()->profile->id,
               'course_id' => $upd->id,
               'section_name' => $this->sections_names,
               'section_description' => $this->sections_descriptions,
         ]);
         if($save){
            $this->dispatchBrowserEvent('CloseAddsection');
         }
    }
    public function add_video($id){
         $this->validate([
           'video_up' => 'required|mimes:mp4,mov,ogg | max:20000',
           'video_title' => 'required',
        ]);
       
         $videopath = $this->video_up->store('videos','public');
         $upd = section::find($id);
         $save = video::insert([
               'section_id' => $upd->id,
               'profile_id' => auth()->user()->profile->id,
               'title' => $this->video_title,
               'video' => $videopath,
         ]);
         if($save){
          alert("video is save");
           
         }
         
    }

   

    
}
