<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tscontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\viewcoursecontroller;
use App\Http\Controllers\followersController;
use App\Http\Controllers\Chatcontroller;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\Googlecontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.home');
})->name('firsthome');


Route::prefix('dashboard')->name('dashboard.')->group(function(){
        Route::middleware(['guest:web,teacher'])->group(function(){
              Route::view('/login', 'dashboard.loginpage')->name('Login');
              Route::view('/register', 'dashboard.registertion')->name('register');
              Route::post('/create',[tscontroller::class,'create'])->name('create');
              Route::post('/check',[tscontroller::class,'check'])->name('check');
        }); 
        
         Route::middleware(['auth:web,teacher,sanctum','verified'])->group(function(){
               Route::get('/Home',[tscontroller::class,'index'] )->name('Home');
               Route::post('/logout',[tscontroller::class, 'logout'])->name('logout');
               Route::post('/Home/profile/update/{id}',[tscontroller::class,'update'])->name('profile');
               Route::post('/Home/profile/add_course',[tscontroller::class,'Add_course'])->name('add_course');
               Route::get('/Home/profile/{id}',[tscontroller::class,'profile'])->name('profile');
               Route::get('/Home/videos/{id}',[tscontroller::class,'video_view'])->name('video');
               Route::get('/Home/delete/{id}',[tscontroller::class,'Delete_photo'])->name('Delete');
               Route::get('/Home/viewcourse',[viewcoursecontroller::class,'view']);
               Route::get('/Home/stripe',[StripeController::class,'stripe']);
               Route::post('/Home/stripeid',[StripeController::class,'stripePost'])->name('payment');
               Route::post('/Home/post/{id}',[Postcontroller::class,'newpost'])->name('newPost');
               Route::get('/Home/command/{id}',[Postcontroller::class,'newcommand'])->name('newCommand');
               Route::post('follow/{user}', [followersController::class,'store']);
               Route::get('/chat',function(){
                    return Inertia\Inertia::render('chat/container');
               })->name('chat');
                Route::get('/chat/search',[Chatcontroller::class,'search']);
               
               Route::get('/chat/rooms',[Chatcontroller::class,'room']);
               Route::get('/chat/rooms/{roomId}/messages',[Chatcontroller::class,'message']);
               Route::post('/chat/rooms/{roomId}/message',[Chatcontroller::class,'newmessage']);
              
         });

         
});

//google login
Route::prefix('google')->name('google.')->group(function(){
    Route::get('googlelogin',[Googlecontroller::class,'loginWithGoogle'])->name('login');
    Route::any('callback',[Googlecontroller::class,'GoogleCallBack'])->name('callback');

});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



     
      





