<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    const LOCAL_STORAGE_FOLDER ='public/avatars/';
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function show($id){
        $user = $this->user->find($id);
        return view('users.profile.show')
            ->with('user', $user);
    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|min:1|max:50',
            'email'=>'required|email|max:50|unique:users,email,'. auth()->user()->id,
            'avatar'=>'mimes:jpg,jpeg,png,gif|max:1048',
        ]);

        $user = $this->user->find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->avatar){
            if($user->avatar){
                $this->deleteAvatar($user->avatar);
            }

            $user->avatar = $this->saveAvatar($request);
        }

        $user->save();

        return redirect()->route('profile.show', auth()->user()->id);
    }

    public function saveAvatar($request){
        $fileName = time(). ".".$request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $fileName);
        return $fileName;
    }

    public function deleteAvatar($fileName){
        $filePath = self::LOCAL_STORAGE_FOLDER.$fileName;
        if(Storage::disk('local')->exists($filePath)){
            Storage::disk('local')->delete($filePath);
        }
    }

    public function following($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.profile.following')->with('user',$user);
    }

    public function followers($id){
        $user = $this->user->findOrFail($id);
        return view('users.profile.followers')->with('user', $user);
    }

}
