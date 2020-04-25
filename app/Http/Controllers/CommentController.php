<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('user_id',(\Auth::user()->id))->paginate(10);
        // dd($comments[1]->user->name);
        return view('comments.index', compact('comments'));
    }


    public function allItems()
    {
        $comments = Comment::paginate(10);
        // dd($posts[0]->user);
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $data = request()->validate([
            'body' => 'required|alpha_num'
        ]);

        $post = Post::findOrFail($id);
        if ($post) {
            $comment = Comment::create ([
            'user_id'=> \Auth::user()->id,
            'post_id' =>  $id,
            'body'=>$request->body,
            'active' => 1
            ]);
        }
        
        return redirect()->back()->withErrors([ 'Comment Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('comments.show', ['comm' => Comment::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('comments.edit', ['comm' => Comment::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comm = Comment::where('id',$id)->update ([
            'body'=>$request->body,
            'active' => 1
        ]);

        return view('comments.show', ['comm' => Comment::findOrFail($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comm = Comment::find($id);
        
        $comm->delete();
 
        return redirect()->action('CommentController@index')->withErrors([ 'Comentary Deleted']);
        
    }
}
