<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Cog\Laravel\Love\ReactionType\Models\ReactionType;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()
        ->withUserMedia()
        ->withLoveReactantCounters()
        ->paginate(10);

        $suggested_blogs = Post::withUserMedia()
        ->withLoveReactantCounters()
        ->get()
        ->sortByDesc(function ($post) {
            return $post->viaLoveReactant()->getReactionCounterOfType('Like')->getCount();
        })
        ->take(5);

        return view('posts.index', compact('posts', 'suggested_blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = Post::create([...$validatedData, 'user_id' => Auth::id()]);

        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['user.media']);
        $paginatedComments = $post->comments()
            ->with(['user.media', ])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('posts.show', compact('post', 'paginatedComments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (Auth::id() != $post->user->id) {
            return redirect()->back();
        }

        $post->update($validatedData);

        if ($request->hasFile('image')) {
            $post->updateImage($request->file('image'));
        }

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->user->id == Auth::id()) {
            $post->comments()->delete();
            $post->delete();
            return redirect()->route('posts.index')->with('success' , 'Blog successfully deleted');
        }
        return redirect()->back();
    }

    public function add_like(Request $request, Post $post) {
        $reacterFacade = Auth::user()->viaLoveReacter();

        if($reacterFacade->hasReactedTo($post, 'Like')) {
            $reacterFacade->unreactTo($post, 'Like');
        } else {
            $reacterFacade->reactTo($post, 'Like');
        }

        $post->load('loveReactant.reactionCounters');

        return view('posts.likes', compact('post'));
    }
}
