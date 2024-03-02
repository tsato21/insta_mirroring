<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLiked(){
        return $this->likes()->where('user_id', auth()->user()->id)->exists();
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_post', 'category_id', 'post_id')->withTrashed();
    }
}
