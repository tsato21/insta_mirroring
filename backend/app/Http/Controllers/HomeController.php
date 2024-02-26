<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $user;
    private $post;
    private $category;

    public function __construct(User $user, Post $post, Category $category){
        $this->user = $user;
        $this->post = $post;
        $this->category = $category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexFollowing()
    {
        $allPosts = $this->post->latest()->get();
        $allCategories = $this->category->all();
        $suggestedUsers = $this->getSuggestedUsers();
        
        $postsOfFollowingUsers = [];
        foreach($allPosts as $post){
            if($post->user->isFollowed()){
                $postsOfFollowingUsers[] = $post;
            }
        }
        return view('users.home-following')
            ->with('postsOfFollowingUsers', $postsOfFollowingUsers)
            ->with('allCategories', $allCategories)
            ->with('suggestedUsers', $suggestedUsers);
    }

    public function indexAll()
    {
        $allPosts = $this->post->latest()->get();
        $allCategories = $this->category->all();
        $suggestedUsers = $this->getSuggestedUsers();

        return view('users.home-all')
            ->with('allPosts', $allPosts)
            ->with('allCategories', $allCategories)
            ->with('suggestedUsers', $suggestedUsers);
    }

    public function getOtherUsersAll(){
        $users = $this->user->all()->except(Auth::user()->id);
        $suggestedUsers = [];
        foreach ($users as $user){
            $suggestedUsers[] = $user;
        }

        return $suggestedUsers;
    }

    public function getSuggestedUsers(){
        $users = $this->user->all()->except(auth()->user()->id);
        $suggestedUsers = [];
        foreach($users as $user){
            if(!$user->isFollowed()){
                $suggestedUsers[] = $user;
            }
        }
        return $suggestedUsers;
    }
}
