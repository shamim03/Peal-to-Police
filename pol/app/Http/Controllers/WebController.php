<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function contact(){
        return view('contact')->with(['user'=> \Auth::user()]);
    }
    public function inbox(\App\User $u){
        return view('inbox')->with(['user'=>$u]);
    }
    public function messageSave(\Illuminate\Http\Request $r,\App\user $u){
        $validatedData = $r->validate([
            'body' => 'required',
        ]);
        $msg = new \App\Message;
        $msg->body = $r->body;
        $file = $r->f;
        if($r->f){
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('',$name,'public');
            $msg->file = $name;
        }
        $msg->name = \Auth::user()->name;
        $msg->address = \Auth::user()->address;
        $msg->mobile = \Auth::user()->mobile;
        
        $msg->user_id = $u->id;
        $msg->save();
        return redirect()->back();
    }
    public function gd(){
        return view('gd');
    }
    public function gdSubmit(\Illuminate\Http\Request $r){
        $validatedData = $r->validate([
            'details' => 'required',
        ]);
        $g = new \App\GD;
        $g->name = \Auth::user()->name;
        $g->address = \Auth::user()->address;
        $g->phone = \Auth::user()->mobile;
        $g->details = $r->details;
        $g->save();
        return redirect()->back();
    }
    public function deleteGd(\App\GD $g){
        $g->delete();
        return redirect()->back();
    }
    public function messageDelete(\App\Message $m){
        $m->delete();
        return redirect()->back();
    }
}
