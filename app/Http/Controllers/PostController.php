<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Traits\AppTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use AppTrait;

    public function __construct()
    {
            $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        // dd($posts[0]->user);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $data = request()->validate([
            'name' => 'required|alpha_num',
            'description' => 'required|alpha_num'
        ]);

        $slug = $this->createSlug($request->name,'posts','slug');
        $post = Post::create ([
            'user_id'=> \Auth::user()->id,
            'slug' =>  $slug,
            'name'=>$request->name,
            'description'=>$request->description,
            'active' => 1
        ]);

        if ($request->hasFile('img')) {
            
            $url = $request->image->store('public');
            Post::where('id',$post->id)->update(['url' => $url]);
        }

        return redirect()->action('PostController@show', [$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug = $this->createSlug($request->name,'posts','slug');
        $post = Post::where('id',$id)->update ([
            'slug' =>  $slug,
            'name'=>$request->name,
            'description'=>$request->description,
            'active' => 1
        ]);

        if ($request->hasFile('img')) {
            $url = Post::findOrFail($id);
            Storage::disk('public')->delete($post->url);
            $url = $request->image->store('public');
            Post::where('id',$post->id)->update(['url' => $url]);
        }
        return view('posts.show', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Pos::find($id);
        
        $post->delete();
 
        return redirect()->back()->withErrors([ 'POst Deleted']);
    }
}
