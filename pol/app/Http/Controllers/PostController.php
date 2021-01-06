<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function wall(){
        $posts = \App\Post::orderBy('created_at', 'desc')->with('comments.user')->get();
        return view('wall')->with(['posts'=>$posts]);
    }
    public function create(\Illuminate\Http\Request $request){
        $post = new \App\Post ;
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'image' => 'required',
        ]);
        if(!$request->hasFile('image')) abort(404);
        $file = $request->image;
        if(!$request->hasFile('image')) abort(404);
        $name = time() .'.'. $file->getClientOriginalExtension();
        $img = \Image::make($file);
        $img->save($name);
        $post->image = $name;
        $post->title = $request->title;
        $post->body = $request->body;
        \Auth::user()->posts()->save($post);
        return  redirect('profile');
    }
    public function addComment(\Illuminate\Http\Request $request){
    
        $validatedData = $request->validate([
            
            'body' => 'required',
            
        ]);
        $comment = new \App\Comment;
        $comment->body = $request->body;
        $comment->user_id = \Auth::id();
        $comment->post_id = $request->id;
        $comment->save();
        return $comment->load('user');
    
    }
    public function editComment(\Illuminate\Http\Request $request,\App\Comment $comment){
    
        $validatedData = $request->validate([
            
            'body' => 'required',
            
        ]);
        
        $comment->body = $request->body;
        
        $comment->save();
        return $comment->load('user');
    
    }
    public function deleteComment(\Illuminate\Http\Request $request,\App\Comment $comment){
    
   
    
        $comment->delete();
    }
    public function post(\App\Post $post){
        $r = $post->load('comments.user');
        return view('post')->with(['post'=>$r]);
    }
    public function delete(\App\Post $post){
        $post->delete();
        return redirect()->back();
    }
    public function deleteComments(\App\Comment $comment){
        $comment->delete();
        return redirect()->back();
    }
    public function like(\App\Post $p){
        if(\App\Like::where('user_id',\Auth::id())->where('post_id',$p->id)->exists()){
            $r = \App\Like::where('user_id',\Auth::id())->where('post_id',$p->id)->first();
            $r->delete();
            return -1;
        } else {
            $r = new \App\Like;
            $r->l = 0;
            $r->post_id = $p->id;
            $r->user_id = \Auth::id();
            $r->save();
            return 1;
        }
    }
}
