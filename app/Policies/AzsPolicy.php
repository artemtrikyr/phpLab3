<?php

namespace App\Policies;

use App\Models\Azs;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AzsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow viewing if the user has a role like 'Viewer' or any other condition you want
        return true; // Modify as needed based on roles or permissions
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Azs $azs): bool
    {
        // Allow viewing if the user is the creator or has a specific role
        return $user->id === $azs->creator_user_id || $user->role === 'Viewer';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Allow creating if the user has a role like 'Editor' or 'Admin'
        return $user->role === 'Editor' || $user->role === 'Admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Azs $azs): bool
    {
        // Allow updating if the user is the creator or has the 'Editor' role
        return $user->id === $azs->creator_user_id || $user->role === 'Editor';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Azs $azs): bool
    {
        // Allow deleting if the user is the creator or has the 'Superadmin' role
        return $user->id === $azs->creator_user_id || $user->role === 'Superadmin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Azs $azs): bool
    {
        // Allow restoring if the user has the 'Admin' role
        return $user->role === 'Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Azs $azs): bool
    {
        // Allow force deleting if the user has the 'Superadmin' role
        return $user->role === 'Superadmin';
    }
}
