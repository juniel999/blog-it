<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//spatie media
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

//laravel love
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableInterface;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;

use App\Models\User;

class Post extends Model implements HasMedia, ReactableInterface
{
    use HasFactory, InteractsWithMedia, Reactable;

    protected $fillable = ['title', 'description', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function scopeWithUserMedia($query)
    {
        return $query->with(['user' => function ($query) {
            $query->with('media');
        }]);
    }

    public function scopeWithLoveReactantCounters($query)
    {
        return $query->with(['loveReactant' => function ($query) {
            $query->with('reactionCounters');
        }]);
    }

    public function updateImage($image)
    {
        $this->clearMediaCollection('images'); // Remove previous image(s) from the collection
        $this->addMedia($image)->toMediaCollection('images'); // Add new image to the collection
    }
}
