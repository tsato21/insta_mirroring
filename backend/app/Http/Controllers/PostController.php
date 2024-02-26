<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $post;
    private $category;


    public function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = $this->category->all();
        return view('users.posts.contents.create')
            ->with('allCategories', $allCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|array|between:1,3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
            'description' => 'required',
        ]);

        $this->post->user_id = auth()->user()->id;
        $this->post->description = $request->description;
        $this->post->image = $this->saveImage($request);
        $this->post->save();

        foreach($request->category as $categoryId){
            $categoryPost[] = ['category_id'=>$categoryId];
        };

        $this->post->categoryPost()->createMany($categoryPost);

        return redirect()->route('home');
    }

    private function saveImage($request){
        //Change the filename into "local time" + "file format" to avoid overlapping"
        $image_name = time().'.'.$request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->find($id);
        $allCategories = $this->category->all();
        // $selectedCategories is defined in blade file
        // $selectedCategories = [];
        // foreach($post->categoryPost as $category_post){
        //     $selectedCategories[] = $category_post->category_id;
        // }

        return view('users.posts.show')
            ->with('post', $post)
            ->with('allCategories', $allCategories);
            // ->with('selectedCategories', $selectedCategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $this->post->find($id);
        $request->validate([
            'category'=>'required|array|between:1,3',
            'image'=>'required|mimes:jpeg,jpg,png|max:1048',
            'description'=>'required',
        ]);

        $this->deleteImage($post->image);
        $post->image = $this->saveImage($request);
        
        $post->description = $request->description;
        
        $post->save();

        $post->categoryPost()->delete();

        foreach($request->category as $categoryId){
            $categoryPost[] = ['category_id'=>$categoryId];
        }
        $post->categoryPost()->createMany($categoryPost);

        return redirect()->back();
    }

    public function deleteImage($fileName){
        $filePath = self::LOCAL_STORAGE_FOLDER . $fileName;
        if(Storage::disk('local')->exists($filePath)){
            Storage::disk('local')->delete($filePath);
        };
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $post->delete();

        return redirect()->route('home');
    }
}
