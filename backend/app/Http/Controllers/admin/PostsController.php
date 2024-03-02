<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;
use App\Models\Category;

class PostsController extends Controller
{
    private $post;
    private $category;
    const LOCAL_STORAGE_FOLDER = 'public/images/';

    function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }

    function index(){
        $allPosts = $this->post->withTrashed()->paginate(5);
        $allCategories = $this->category->withTrashed()->get();
        
        return view('admin.posts.show')
            ->with('allPosts', $allPosts)
            ->with('allCategories', $allCategories);
    }

    public function unhide($id){
        $post = $this->post->onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back();
    }

    public function hide($id){
        $post = $this->post->findOrFail($id);

        $post->delete();

        return redirect()->back();
    }

    public function forceDelete($id){
        $post = $this->post->withTrashed()->findOrFail($id);
        $fileName = $post->image;
        $this->deleteImage($fileName);
        $post->forceDelete();
        return redirect()->back();
    }

    public function deleteImage($fileName){
        $filePath = self::LOCAL_STORAGE_FOLDER . $fileName;
        if(Storage::disk('local')->exists($filePath)){
            Storage::disk('local')->delete($filePath);
        }
        return;
    }
}
