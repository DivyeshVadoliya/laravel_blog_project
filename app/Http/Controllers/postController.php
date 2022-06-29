<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Gates\AdminGates;
use Illuminate\Support\Facades\Gate;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('postPage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $user=$request->user();
        $post= new Post;
        $post->tital=$request->title;
        $post->blog=$request->blog;
        $user->post()->save($post);
        return redirect(route('dashboard'))->with('status','blog added..!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin()
    {
        $posts=Post::all();
        return view('adminShowData',['posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $editid=Post::find($id);
       // dd($editid);
        return view('editPage',['editdata'=>$editid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post=Post::find($id);     
        $post->tital=$request->title;
        $post->blog=$request->blog;
        $post->save();
        return redirect(route('dashboard'))->with('status','blog Updated..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Gate::denies('isAdmin',$id)){
           // abort(403);
            return redirect(route('dashboard'))->with('status','You do not have authority to Delete....!'); 
        }
        Post::destroy($id);
        return redirect(route('display_admin_data'))->with('status','blog Deleted....!'); 
    }
}
