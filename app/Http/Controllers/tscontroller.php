<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\teacher;
use App\Models\profile;
use App\Models\course;
use App\Models\video;
use App\Models\post;
use App\Models\todo;
use App\Models\command;
use App\Models\userlocation;
use App\Models\section;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Support\Facades\Auth;



class tscontroller extends Controller
{
    public function index(){

         return view('dashboard.Home');
    }

    
    public function create(Request $request){

           $request->validate([
               'name' => 'required|min:5',
               'role' => 'required',
               'email' => 'required|email|unique:users,email|unique:teachers,email',
               'password' => 'required|min:5|max:30',
               'cpassword' => 'required|min:5|max:30|same:password'
            ]);

          if($request->role == 'student'){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $save = $user->save();

             if($save){
                return redirect()->route('dashboard.Home')->with('success','register is success');
             }else{
               return redirect()->back()->with('fail','register is fail');
              }
          }

          if($request->role == 'teacher'){
            $teacher = new teacher();
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            $save = $teacher->save();

             if($save){
                return redirect()->route('dashboard.Home')->with('success','register is success');
             }else{
               return redirect()->back()->with('fail','register is fail');
              }
          }
          
   }

   public function check(Request $request){

        $filedtype = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if($filedtype == 'email'){
          $request->validate([
               'name' => 'required',
               'role' => 'required',
               'password' => 'required|min:5|max:30'
          ]);
        }else{
           $request->validate([
               'name' => 'required',
               'role' => 'required',
               'password' => 'required|min:5|max:30'
          ]);   

        }
         
          if($request->role == 'student'){
               $creds = array($filedtype=>$request->name, 'password'=>$request->password);
        
               if(Auth::guard('web')->attempt($creds)){
                   $checkuser = User::where($filedtype, $request->name)->first();
                   if($checkuser->blocked == 1){
                        Auth::guard('web')->logout();
                        return redirect()->route('dashboard.Login')->with('fail','your account is blocked');
                   }else{
                       return redirect()->route('dashboard.Home');
                   }
                   
               }else{
            
                   return redirect()->route('dashboard.Login')->with('fail','wrong user logged');
               }
          }
          if($request->role == 'teacher'){
              $creds = array($filedtype=>$request->name, 'password'=>$request->password);
        
               if(Auth::guard('teacher')->attempt($creds)){
                   $checkuser = teacher::where($filedtype, $request->name)->first();
                   if($checkuser->blocked == 1){
                        Auth::guard('teacher')->logout();
                        return redirect()->route('dashboard.Login')->with('fail','your account is blocked');
                   }else{
                       return redirect()->route('dashboard.Home');
                   }
                   
               }else{
            
                   return redirect()->route('dashboard.Login')->with('fail','wrong user logged');
               }
          }
         

   }
   public function profile(User $user, teacher $teacher ,$id){
          
         $profile = profile::find($id);
         $course = course::where('owner_course','=',$profile->id )->get();
         $todo = todo::where('profile_id','=',$profile->id )->get();
         $count =  course::where('owner_course','=',$profile->id )->count();
         $cvideo =  video::where('profile_id','=',$profile->id )->count();
        if(auth()->user()->id != $id){
            profile::find($id)->increment('views');
            $geoipinfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
            $userInfo = new userlocation();
            $userInfo->user_id = auth()->user()->profile->id;
            $userInfo->country =  $geoipinfo->country;
            $userInfo->city =  $geoipinfo->city;
            $userInfo->save();
        }
         if (Auth::guard('web')->check()) {
              $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
         }
         if(Auth::guard('teacher')->check()){
             $follows = (auth()->user()) ? auth()->user()->following->contains($teacher->id) : false;
         }
         
         return view('dashboard.profile', compact('profile','course','count',  'follows', 'cvideo','todo'));
       
   }
  public function Delete_photo($id){
         $profile = profile::find($id);
         $profile->image = null;
        $update = $profile->update();
        if($update){
             return redirect()->back();
        }
        
  }

   public function update(Request $request, $id){
        
         $request->validate([
           'user_update' => 'required|unique:profiles,username',
           'email_update' => 'required|unique:profiles,email',
           'image_update' => 'required'
         ],[
           'user_update.required' => 'username is required',
           'user_update.unique' => 'this is username already exists'

         ]);
       
        $data = profile::find($id);
        $data->username = $request->user_update;
      
        $data->email = $request->email_update;
           
        $imagepath = request('image_update')->store('profile','public');
            
        $data->image = $imagepath;
        $update = $data->update();

        $teacher = teacher::find(auth()->user()->id);
        $teacher->name = $request->user_update;
        $teacher->email = $request->email_update;
         $teacher->update();
       if($update){
         
           return redirect()->back();
       } 
        
   }
   public function logout(){
        if (Auth::guard('web')->check()) {
             Auth::guard('web')->logout();
        } elseif (Auth::guard('teacher')->check()) {
             Auth::guard('teacher')->logout();
        }
           return redirect()->route('firsthome');
    }

    public function Add_course(Request $request, profile $profile){
        $request->validate([
            'course_name' => 'required|string',
            'price' => 'numeric|min:200',
            'description' => 'required|string|max:300',
            'image_course' => 'required',
        ]);

        $data = new course();
        $data->owner_course = auth()->user()->profile->id;
        $data->course_name = $request->course_name;
        $data->course_description = $request->description;
        $data->price = $request->price;

        $imagepath = request('image_course')->store('course','public');

        $data->image_course =  $imagepath;
        $request->session()->put('courseId', $data->id);
        $save = $data->save();

        if($save){
            return redirect()->back();
        }
    }

    public function video_view($id){
       
       $user = course::find($id);
       $sections = section::where('course_id', '=', $user->id)->get();
       $post = post::where('course_id', '=', $user->id)->get();
        $commands = command::all();
        $profile = profile::select('id','username')->get();
       if($user){
           return view('dashboard.videos', compact('user','sections', 'post','commands','profile'));
       }else{
           abort(404);
       }
       
    }
    public function save_video(Request $request, $id){
         
         $request->validate([
           'sections_names' => 'required',
           'sections_descriptions' => 'required',
        ]);
          
        $upd = course::find($id);
         $save = section::insert([
               'profile_id' => auth()->user()->profile->id,
               'course_id' => $upd->id,
               'section_name' => $request->sections_names,
               'section_description' => $request->sections_descriptions,
         ]);
         if($save){
             return redirect()->back();
         }
    }
   
    
   
}
