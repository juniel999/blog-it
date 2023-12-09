<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserController extends Controller
{
    public function follow_user(Request $request, User $user) {
        if(Auth::user()->isFollowing($user))  {
            Auth::user()->unfollow($user);
        } else {
            Auth::user()->follow($user);
        }

        return redirect()->back();
    }

    public function followers(User $user) {
        $followers = $user->followers()->with([
            'media'
        ])->get();

        return view('users.followers', compact('followers'));
    }

    public function notifications() {
        $notifications = Auth::user()->unreadNotifications;

        return view('users.notifications', compact('notifications'));
    }

    public function unread_notification(Request $request, $notification_id) {
        $notification = Auth::user()->notifications()->find($notification_id);

        $notification->markAsRead();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $posts = $user->posts()->with([ 'user' => function($query) {
            $query->with('media');
        }
        , 'loveReactant' => function($query) {
            $query->with('reactionCounters');
        }
        ])->get();

        $user->load('media');

        $followers = $user->followers()->count();
        $followings = $user->followings()->count();

        return view('users.show', compact('user', 'posts', 'followers', 'followings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
