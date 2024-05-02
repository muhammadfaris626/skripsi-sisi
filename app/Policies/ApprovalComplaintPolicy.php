<?php

namespace App\Policies;

use App\Models\ApprovalComplaint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApprovalComplaintPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('menu: approvalComplaint');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ApprovalComplaint $approvalComplaint): bool
    {
        return $user->can('read: approvalComplaint');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create: approvalComplaint');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ApprovalComplaint $approvalComplaint): bool
    {
        return $user->can('update: approvalComplaint');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ApprovalComplaint $approvalComplaint): bool
    {
        return $user->can('delete: approvalComplaint');
    }
}
