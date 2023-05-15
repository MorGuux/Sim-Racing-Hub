<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Car;
use App\Models\Track;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
            $posts = $this->paginate($posts);
        } else {
            $posts = Post::paginate(10, ['*'], 'posts');
        }
        $tags = Tag::all();
        return view('posts.index', ['posts' => $posts, 'tags' => $tags]);
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
        $post = Post::findOrFail($id);

        // Abort if the user isn't the owner of the post or not an admin
        if ($post->user_id != auth()->user()->id && !auth()->user()->is_admin) {
            abort(403);
        }

        $cars = Car::all();
        $tracks = Track::all();
        $tags = Tag::all();
        return view('posts.edit', ['post' => $post, 'cars' => $cars, 'tracks' => $tracks, 'tags' => $tags]);
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
        // Validate the request
        $validatedPost = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'car_id' => 'required|exists:cars,id',
            'track_id' => 'required|exists:tracks,id',
            'tags' => 'required|array',
        ]);

        $post = Post::findOrFail($id);

        // Abort if the user isn't the owner of the post or not an admin
        if ($post->user_id != auth()->user()->id && !auth()->user()->is_admin) {
            abort(403);
        }

        $post->title = $validatedPost['title'];
        $post->body = $validatedPost['body'];
        $post->car_id = $validatedPost['car_id'];
        $post->track_id = $validatedPost['track_id'];
        $post->save();

        $post->tags()->sync($validatedPost['tags']);

        session()->flash('message', 'The post was successfully updated!');
        return redirect()->route('posts.show', ['id' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index')->with('success', 'Post was successfully deleted.');
    }
}
