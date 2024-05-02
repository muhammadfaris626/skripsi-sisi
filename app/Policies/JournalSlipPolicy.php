<?php

namespace App\Policies;

use App\Models\JournalSlip;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JournalSlipPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('menu: journalSlip');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JournalSlip $journalSlip): bool
    {
        return $user->can('read: journalSlip');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create: journalSlip');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JournalSlip $journalSlip): bool
    {
        return $user->can('update: journalSlip');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JournalSlip $journalSlip): bool
    {
        return $user->can('delete: journalSlip');
    }
}
