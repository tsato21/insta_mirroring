<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function categoryPost(){
        return $this->hasMany(Category::class);
    }

    // In Category model
    public function posts(){
        return $this->belongsToMany(Post::class, 'category_post', 'category_id', 'post_id')->withTrashed();
    }
}
