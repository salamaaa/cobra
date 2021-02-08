<?php


namespace App;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait Friendable
{

    public function isFriend(User $user)
    {
        $ids = $this->friends()->pluck('id');
        foreach ($ids as $id) {
            if ($user->id == $id)
                return true;
        }
        return false;
    }

    public function addFriend(User $user)
    {
        return $this->friends()->save($user);
    }

    public function deleteFriend(User $user)
    {
        return $this->friends()->detach($user);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_user_id');
    }
}
