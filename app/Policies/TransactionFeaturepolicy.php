<?php

namespace App\Policies;

use App\Models\TransactionFeature;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransactionFeaturepolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('menu: transactionFeature');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TransactionFeature $transactionFeature): bool
    {
        return $user->can('read: transactionFeature');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create: transactionFeature');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TransactionFeature $transactionFeature): bool
    {
        return $user->can('update: transactionFeature');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TransactionFeature $transactionFeature): bool
    {
        return $user->can('delete: transactionFeature');
    }
}
