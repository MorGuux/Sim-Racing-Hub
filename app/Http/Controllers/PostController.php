<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Car;
use App\Models\Track;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tag) {
            $posts = Tag::where('id', $request->tag)->firstOrFail()->posts;
        } else {
            $posts = Post::all();
        }
        $tags = Tag::all();
        return view('posts.index', ['posts' => $posts, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        $tracks = Track::all();
        $tags = Tag::all();
        return view('posts.create', ['cars' => $cars, 'tracks' => $tracks, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedPost = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'car_id' => 'required|exists:cars,id',
            'track_id' => 'required|exists:tracks,id',
            'tags' => 'required|array',
        ]);

        $post = new Post;
        $post->title = $validatedPost['title'];
        $post->body = $validatedPost['body'];
        $post->car_id = $validatedPost['car_id'];
        $post->track_id = $validatedPost['track_id'];
        $post->user_id = auth()->user()->id;
        $post->save();

        $post->tags()->attach($validatedPost['tags']);

        session()->flash('message', 'The post was successfully saved!');
        return redirect()->route('posts.show', ['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
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
    }
}
