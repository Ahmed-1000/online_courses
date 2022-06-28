@extends('header.header')

@include('models.todo')  
@include('models.new_course')
@include('models.updateprofile') 
@section('content')
   <div class="image_pro">
         
         <img src="{{$profile->imageprofile()}}" width="240px" height="180px">
         <h2 class="mt-4">{{$profile->username}}</h2>
         <a  data-toggle="modal" data-target="#todolist" class="btn btn-info pl-4">Add skills</a>
         <h4>skills</h4>
        @foreach($todo as $todos)
         <div  style="display:inline; margin:130px;">
             
             <br/>
             <span>{{$todos->content}}</span>
            
         </div>
        @endforeach
   </div>
   <div style="margin:-22px 330px;">
     @if(Auth::guard('teacher')->check())
        @if($profile->teacher_id == auth()->user()->id)
          <a href="/dashboard/Home/delete/{{$profile->id}}">Delete avatar</a>
        @endif
     @endif
      @if(Auth::guard('web')->check())
        @if($profile->user_id == auth()->user()->id)
          <a href="/dashboard/Home/delete/{{$profile->id}}">Delete avatar</a>
        @endif
     @endif
   </div>
      
   <div class=" items-pro">
    <a href="/dashboard/chat"  class="pt-4">message</a> 
       <h4>{{$profile->status}}</h4>
        <p>followers: {{$profile->followers()->count()}}</p>
        <p >courses: {{$count}} </p>
        <p >views: {{$profile->views}}</p>
        <p>videos: {{$cvideo}}</p>
   </div>
    <div id="app">
        <FollowBtn user-id="{{$profile->id}}" follows="{{$follows}}" />
    </div>
   <div class="btn-profile">
    
   @if(Auth::guard('teacher')->check())
     @if($profile->teacher_id == auth()->user()->id)
       <button class="btn btn-info" id="update">update profile</button>
    
           @if($profile->status == 'teacher')
            
              <button class="btn btn-info"  data-toggle="modal" data-target="#course_create">Add Course</button>
              
            @endif
         @endif
   @endif
   @if(Auth::guard('web')->check())
     @if($profile->user_id == auth()->user()->id)
       <button class="btn btn-info" id="update">update profile</button>
    
           
         @endif
   @endif
   </div>
    
  <div class="container-fluid">
    <div class="row">
      <h2 class="title-one">Courses</h2>
       <hr>
     <section class="flex">

     
        
        
              @foreach($course as $courses)
               
                  <a href="/dashboard/Home/videos/{{$courses->id}}" style="cursor:pointer;">
                    <div >
                        <div >
                            <img src="/storage/{{$courses->image_course}}" width="300" height="50" class="img-fluid" />
                            <p class="title-course px-5">{{$courses->course_name}}</p>
                            <p class="des">{{$courses->course_description}}</p>
                            <p class="teacher-name ">{{$profile->username}}</p>
                            <div class="star-rate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p class="prise">{{$courses->price}}</p>
                            <a class="btn-sell" href="#">Best seller</a>
                        </div>
                    </div>
                </a>
                
              @endforeach
         
           
     </section>
    </div>
  </div>
   

   
  <script>
       
         var myInput = document.getElementById('update');
         
        myInput.addEventListener('click',function(event){
                  
                   $('.edit-profile').modal('show');
        });
          var Add = document.getElementById('Add');
         
        Add.addEventListener('click',function(event){
                  
                   $('.add-course').modal('show');
        });
          
        window.addEventListener('OpenAddskills', function(){
                  $('.skillmodal').find('span').html('');
                  $('.skillmodal').find('form')[0].reset();
                  $('.skillmodal').modal('show');
                 
         });

       
       
  </script>
@endsection
