<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Post;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_post';
    protected $fillable = ['category_id', 'post_id']; // createMany([category[1,2,3]]);
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class)->withTrashed();
    }

}
