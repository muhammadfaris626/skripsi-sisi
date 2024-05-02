<?php

namespace App\Policies;

use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransactionTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('menu: transactionType');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TransactionType $transactionType): bool
    {
        return $user->can('read: transactionType');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create: transactionType');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TransactionType $transactionType): bool
    {
        return $user->can('update: transactionType');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TransactionType $transactionType): bool
    {
        return $user->can('delete: transactionType');
    }
}