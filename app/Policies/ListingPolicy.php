<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{
    /**
     * Determine whether the user can view any models.
     */

//    public function before(?User $user, $ability) {
//        return $user->is_admin && $ability === 'update';
//    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Listing $listing): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): Response
    {
        return $listing->owner_id == $user->id || $user->is_admin  ? Response::allow() : Response::denyAsNotFound('Listing not found');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing): Response
    {
        return $listing->owner_id == $user->id || $user->is_admin   ? Response::allow() : Response::denyWithStatus(401, 'You are not authorized to perform this action');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): Response
    {
        return $listing->owner_id == $user->id || $user->is_admin   ? Response::allow() : Response::denyWithStatus(401, 'You are not authorized to perform this action');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): Response
    {
        return $listing->owner_id == $user->id || $user->is_admin   ? Response::allow() : Response::denyWithStatus(401, 'You are not authorized to perform this action');
    }
}
