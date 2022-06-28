@extends('header.header')


@section('content')
    
    
         @foreach($courses as $course)
              
                  <a href="/dashboard/Home/videos/{{$course->id}}" style="cursor:pointer;">
                    <div >
                        <div >
                            <img src="/storage/{{$course->image_course}}" width="300" height="50" class="img-fluid" />
                            <p class="title-course px-5">{{$course->course_name}}</p>
                            <p class="des">{{$course->course_description}}</p>
                            @foreach($profile as $profiles)  
                             @if($course->owner_course == $profiles->id)
                               <p class="teacher-name ">{{$profiles->username}}</p>
                             @endif
                            @endforeach 
                            <div class="star-rate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                           
                              <p class="prise">{{$course->price}}</p>
                              <a class="btn-sell" href="#">Best seller</a>
                            
                        </div>
                    </div>
                </a>
               
        @endforeach

@endsection