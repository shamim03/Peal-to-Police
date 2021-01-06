<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(\Illuminate\Http\Request $r) {
        $user = \Auth::user();
        if($r->q){
            return view('profile')->with(['r'=>$r,'user'=>$user,'ok'=> \Auth::id()==$user->id, 'posts'=>$user->posts()->orderBy('created_at', 'desc')->where('title','like','%'.$r->q.'%')->with('comments.user')->get()]);
        }
        return view('profile')->with(['r'=>$r,'user'=>$user,'ok'=> \Auth::id()==$user->id, 'posts'=>$user->posts()->orderBy('created_at', 'desc')->with('comments.user')->get()]);
    
    }
    public function dp(\Illuminate\Http\Request $request){
        $file = $request->image;
        
        //if(!$request->hasFile('image')) abort(404);
        $name = time() .'.'. $file->getClientOriginalExtension();
        $img = \Image::make($file);
        $img->resize(300,300);
        $img->save($name);
        $user = \Auth::user();
        $user->image = $name;
        $user->save();
        return redirect()->back();
    }
    public function edit(){
        return view('edit-profile')->with(['user'=>\Auth::user()]);
    }
    public function editSave(\Illuminate\Http\Request $request){
        $user = \Auth::user();
        $user->sex = $request->sex;
        $user->age = $request->age;
        $user->mobile = $request->mobile;
        $user->details = $request->details;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->nid = $request->nid;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->address = $request->address;
        
        $user->save();
        return redirect('profile');
    }
    public function user(\Illuminate\Http\Request $r,\App\User $user){
        if(\Auth::id()==$user->id) return redirect('/profile');
        if($r->q){
            return view('user')->with(['r'=>$r,'user'=>$user,'ok'=> \Auth::id()==$user->id, 'posts'=>$user->posts()->orderBy('created_at', 'desc')->where('title','like','%'.$r->q.'%')->with('comments.user')->get()]);
        }
        return view('user')->with(['r'=>$r,'user'=>$user,'ok'=> \Auth::id()==$user->id, 'posts'=>$user->posts()->orderBy('created_at', 'desc')->with('comments.user')->get()]);
    }
    public function delete(App\User $user){
        $user->delete();
        return redirect()->back();
    }
    public function approve(\App\Wanted $u){
        $u->status = 1;;
        $u->save();
        return redirect()->back();
    }
    public function messages(){
        return view('messages')->with(['msgs' => \Auth::user()->messages]);
    }
}
