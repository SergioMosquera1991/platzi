<?php

use Illuminate\Support\Facades\Route;

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

use App\Post;

Route::get('eloquent', function(){
    $posts = Post::where('id', '>=', '10')
    ->take(3)
    ->orderBy('id', 'desc')
    ->get();
    //dd($posts);

    foreach($posts as $post){
        echo "$post->id $post->title <br>";
    }
});


Route::get('posts', function(){
    $posts = Post::get();
    //dd($posts);

    foreach($posts as $post){
        echo "$post->id <strong>{$post->user->get_name}</strong> $post->get_title <br>";
    }
});

use App\User;
Route::get('users', function(){
    $users = User::get();
    //dd($posts);

    foreach($users as $user){
        echo "$user->id <strong>$user->get_name</strong> {$user->posts->count()} post <br>";
    }
});

Route::get('collections', function(){
    $users = User::get();
    //dd($users);

    //dd($users->contains(5));
    //dd($users->except([1,2,3]));
    //dd($users->only(4));
    //dd($users->find(4));
    dd($users->load('posts'));
});

Route::get('serialization', function(){
    $users = User::get();
    //dd($users);

    //dd($users->toArray());
    $user = $users->find(1);
    //dd($user);
    dd($user->toJson());
});

/*Route::get('/', function () {
    return view('welcome');
});

Route::resource('pages', 'PagesController');*/
