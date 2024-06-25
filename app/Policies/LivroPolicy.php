<?php

namespace App\Policies;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LivroPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Livro $livro)
    {
        return $user->id === $livro->user_id;
    }

    public function delete(User $user, Livro $livro)
    {
        return $user->id === $livro->user_id;
    }
}
