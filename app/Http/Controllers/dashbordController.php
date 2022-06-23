<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class dashbordController extends Controller
{
    //
    public function show(Request $request)
    {
    	//$posts=Post::all();
    	//dd($posts);
    	$userid=$request->user()->id;
    	$posts=Post::where('user_id',$userid)->get();
    	return view('dashboard',['posts'=>$posts]);
    }
    public function showData(Request $request)
    {
    	$posts=Post::all();
    	//dd($posts);
    	return view('welcome',['posts'=>$posts]);
    }
}
