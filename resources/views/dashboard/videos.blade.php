@extends('header.header')


@include('models.posts') 
@section('content')

<h1> {{$user->course_name}}</h1>
 
 
 @livewire('videupload')
 <a class="btn btn-info" data-toggle="modal" data-target="#post_create">Add new post</a>


 <section>
  
      <ul>
        @foreach ( $post as $posts )
           <li>
                <div style="width:50px; height:50px; border-radius:50%; margin-left:530px; position: absolute; ">
                   <img src="{{Auth::guard('teacher')->user()->profile->imageprofile()}}" width="50px" height="50px" style="border-radius:50%;">
                @foreach($profile as $profiles) 
                  @if($posts->profile_id == $profiles->id)
                    <span style=" margin:30px; position: absolute; top:-15px; ">{{$profiles->username}}</span>
                  @endif
                @endforeach
                   <div style="width:340px; padding:6px; background:#f1faee; margin-top:10px; ">
                     <span>{{$posts->post}}</span>
                   </div>
                    
                   <form action="{{url('dashboard/Home/command/'.$posts->id)}}" method="get">
                        <input type="text" class="form-control command-input" name="command" placeholder="Add command...">
                        <button class="btn btn-primary rounded-pill fix-pos" >Add</button>
                   </form>
                  
                
                    <tr style="margin:40px 20px auto;  overflow:auto;">
                       @foreach ( $commands as $command )
                        @if($command->post_id == $posts->id)
                            <div class="container">
                               <img src="{{Auth::guard('teacher')->user()->profile->imageprofile()}}" width="50px" height="50px" style="border-radius:50%;">
                               <p>{{$command->command}}</p>
                               <span class="time-right">11:00</span>
                             </div>
                           @endif
                       @endforeach
                    </tr>
                   
                  
                </div>
                
                                                   
                  
           </li>
        @endforeach
      </ul>
    
 </section>
 
 <section  style="margin-top:200px;">
      
      
       <div>
       
        @foreach ( $sections as $section )
         
          @if($user->id == $section->course_id)
          
          <form wire:submit.prevent="add_video({{$section->id}})" style="margin-left:50px;">
             <div class="form-group">
                 <label for="">video title</label>
                 <input type="text" class="form-control"  wire:model="video_title" style="width:200px;">
                 <span class="text-danger">@error('video_title') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                 <label for="">section video</label>
                 <input type="file" class="form-control"  wire:model="video_up" style="width:200px;">
                 <span class="text-danger">@error('video_up') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                
                 <input type="submit" class="btn btn-primary"  style="width:200px;">
                 
            </div>
          </form>
           
              <table class="table" style="margin:-45px 480px auto; max-width:500px;">
                 
                 <thead>
                     <tr>
                       <th scope="col">#</th>
                       <th scope="col" class="my-2">videos</th>
                       <th>
                         
                          <strong class="p-2">{{$section->section_name}}</strong>
                       </th>
                       <th>
                           <button class="btn btn-danger" wire:click="decrement">Delete section</button>
                       </th>
                     </tr>
                 </thead>
                 <tbody>
              @if(isset($videos))   
               @foreach($videos as $video)
                   <tr>
                     
                     @if($video->section_id == $section->id)
                        <td>
                            <video width="250" height="150" autoplay muted>
                                <source src="/storage/{{$video->video}}" type="video/mp4" >
                            </video>
                            <span>{{$video->title}}</span>
                            <a href="#">delete</a>
                        </td>
                      @endif 
                   </tr>
               @endforeach
              @endif
                </tbody>
           </table>
           @endif
         
         @endforeach
        
       </div>


 </section>
 <script>
       window.addEventListener('OpenAddsection', function(event){
                  $('.addsection').find('span').html('');
                  $('.addsection').modal('show');

        });
        window.addEventListener('CloseAddsection', function(){
                  $('.addsection').find('span').html('');
                  $('.addsection').find('form')[0].reset();
                  $('.addsection').modal('hide');
                  alert('section has been saved successfully');
         });
 </script>
 
@endsection
