<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function list(User $user)
    {
        return true;//$this->policyCheck('user.list', $user);
    }

    /**
     * Determine whether the user can view the users.
     *
     * @param  \App\User  $user
     * @param  mixed $user
     * @return mixed
     */
    public function view(User $user, $users)
    {
        return $this->policyCheck('user.list', $user);
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->policyCheck('user.create', $user);
    }

    /**
     * Determine whether the user can update the users.
     *
     * @param  \App\User  $user
     * @param  mixed  $users
     * @return mixed
     */
    public function update(User $user,  $users)
    {
        return $this->policyCheck('user.edit', $user);
    }

    /**
     * Determine whether the user can delete the users.
     *
     * @param  \App\User  $user
     * @param  mixed  $users
     * @return mixed
     */
    public function delete(User $user,  $users)
    {
        return $this->policyCheck('user.destroy', $user);
    }
}
