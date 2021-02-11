<?php

namespace App\Policies;

use App\Models\Essay;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EssayPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $this->allow();
    }

    public function create(User $user)
    {
        return $this->allow();
    }

    public function view(User $user, Essay $essay)
    {
        if ($essay->user()->is($user)) {
            return $this->allow();
        }
    }

    public function update(User $user, Essay $essay)
    {
        if ($essay->user()->is($user)) {
            return $this->allow();
        }
    }

    public function delete(User $user, Essay $essay)
    {
        if ($essay->user()->is($user)) {
            return $this->allow();
        }
    }
}
