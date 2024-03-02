<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        $allUsers = $this->user->withTrashed()->paginate(5);
        return view('admin.users.show')->with('allUsers', $allUsers);
    }

    public function deactivate($id){
        $user = $this->user->findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function activate($id){
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id){
        $user = $this->user->findOrFail($id);
        $user->forceDelete();

        return redirect()->back();
    }
}
