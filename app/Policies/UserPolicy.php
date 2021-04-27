<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    protected $team;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->team = Team::defaultTeam();
    }

    public function create(User $user)
    {
        return $user->hasTeamPermission($this->team, 'create.user');
    }

    public function read(User $user)
    {
        return $user->hasTeamPermission($this->team, 'read.user');
    }

    public function update(User $user)
    {
        return $user->hasTeamPermission($this->team, 'update.user');
    }

    public function delete(User $user)
    {
        return $user->hasTeamPermission($this->team, 'delete.user');
    }
}
