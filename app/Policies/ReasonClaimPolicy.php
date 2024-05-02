<?php

namespace App\Policies;

use App\Models\ReasonClaim;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReasonClaimPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('menu: reasonClaim');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReasonClaim $reasonClaim): bool
    {
        return $user->can('read: reasonClaim');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create: reasonClaim');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReasonClaim $reasonClaim): bool
    {
        return $user->can('update: reasonClaim');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReasonClaim $reasonClaim): bool
    {
        return $user->can('delete: reasonClaim');
    }
}
