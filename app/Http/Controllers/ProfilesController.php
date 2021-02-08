<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->paginate(4);
        return view('profiles.show', ['user' => $user,'posts'=>$posts]);
    }

    public function addFriend(User $user)
    {
        Auth::user()->addFriend($user);
        return back();
    }

    public function deleteFriend(User $user)
    {
        Auth::user()->deleteFriend($user);
        return back();
    }

    public function edit(User $user)
    {
        return view('profiles.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100'],
           /* 'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],*/
            'avatar' => ['image']
        ]);



        $user->name = $request->name;
       /* $user->email = $request->email;
        $user->password = $request->password;*/
        if (request('avatar')) {
            $newImg = $request->avatar;
            $newImgName = time() . $newImg->getClientOriginalName();
            $newImg->move('uploads/users/avatars/', $newImgName);
            $user->avatar = 'uploads/users/avatars/' . $newImgName;
        }
        $user->save();
        return redirect()->route('profile.show',$user->name);
    }

}
