<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index(){
    //     $posts = Post::all();
    //     return view('posts.index', compact('posts'));
    // }
    // public function create(){
    //     $users = User::all();
    //     return view('posts.add',compact('users'));
    // }
    // public function edit($id){
    //     $post = Post::findOrFail($id);
    //     return view('posts.edit',compact('post'));
    // }
    // public function store(Request $request){
    //     $request->validate([
    //         'title'=> 'required|string|min:3',
    //         'description'=>'required|string|max:1500',
    //         'user_id'=>['required','exists:users,id']
    //     ]);
    //     $post = new Post();
    //     $post->title = $request->title;
    //     $post->description = $request->description;
    //     $post->user_id = $request->user_id;
    //     $post->save();
    //     return redirect()->route('posts');
    // }

    // public function delete($id){
    //     $post = Post::findOrFail($id);
    //     $post->delete();
    //     return redirect()->route('posts');
    // }
    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    // public function update(Request $request,$id){
    //     $request->validate([
    //         'title'=> 'required|string|min:3',
    //         'description'=>'required|string|max:1500',
    //         'user_id'=>['required','exists:users,id']
    //     ]);
    //     $post = Post::findOrFail($id);
    //     $post->title = $request->title;
    //     $post->description = $request->description;
    //     $post->user_id = $request->user_id;
    //     $post->save();
    //     return redirect()->route('posts');

    // }

    public function home(){
        $posts = Post::all();
        return view('homee',compact('posts'));
    }


    public function log(){
        return view('layouts.navigation');
    }

    public function search(Request $request){
        $posts = Post::where('description','like','%'.$request->search.'%')->get();
        return view('posts.search',compact('posts'));
    }
}
