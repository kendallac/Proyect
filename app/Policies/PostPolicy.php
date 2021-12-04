<?php

namespace App\Policies;

use App\Models\User;
use App\Models\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Post $post )
    {
        if ($user->id==$post->user->id) {
            return true;
        }else {
            return false;
        }    
    }

    public function published(?User $user, Post $post)
    {
        if ($post->satatus==2) {
            return true;
        }else {
            return false;
        }
    }
}
