<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MissingController extends Controller
{
    public function all(\Illuminate\Http\Request $r){
    
        $res = \App\Missing::where('status',1)->where('fn','like','%'.$r->qn.'%');
        
        if($r->qc){
            $res = $res->where('city','like','%'.$r->qc.'%');   
        }
        if($r->qs){
            $res = $res->where('sex','=',$r->qs);
        }
        if($r->qa){
            $res = $res->where('age','=',$r->qa);
        }
        if($r->qd){
            $res = $res->where('dob','=',$r->qd);
        }
        
        return view('missings')->with(['r'=>$r,'ms'=>$res->latest()->paginate(9)]);
    }
    public function add(){
        return view('add-missing');
    }
    public function approve(\App\Missing $u){
        $u->status = 1;;
        $u->save();
        return redirect()->back();
    }
    public function delete(\App\Missing $u){
        $u->status = 0;;
        $u->save();
        return redirect()->back();
    }
    public function addMissing(\Illuminate\Http\Request $request){
        $validatedData = $request->validate([
            'fn' => 'required',
            'age' => 'required|numeric',
            /*'country' => 'required',*/
            'city' => 'required',
            'phone' => 'required|numeric',
            'sex' => 'required',
            'dsc' => 'required',
            'eye' => 'required',
            'skin' => 'required',
            'height' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'dob' => 'required',
        ]);
        $w = new \App\Missing ;
        $w->fn = $request->fn;
        $w->age = $request->age;
       /* $w->country = $request->country;*/
        $w->city = $request->city;
        $w->phone = $request->phone;
        $w->sex = $request->sex;
        $w->dsc = $request->dsc;
        $w->eye = $request->eye;
        $w->skin = $request->skin;
        $w->height = $request->height;
        $w->email = $request->email;
        $w->address = $request->address;
        $w->dob = $request->dob;
    
        if(!$request->hasFile('image')) abort(404);
        $file = $request->file('image');
        $name = time() .'.'. $file->getClientOriginalExtension();
        $img = \Image::make($file);
        $img->resize(300,300);
        $img->save($name);
        $w->image = $name;
    
        $w->save();
        return redirect('missings');
    }
    public function show(\App\Missing $m){
    
        return view('member')->with(['w'=>$m]);
    }
}
