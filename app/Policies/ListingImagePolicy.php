<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingImagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ListingImage $listingImage): bool
    {
        return false;
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
    public function update(User $user, ListingImage $listingImage): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing, ListingImage $listingImage): bool
    {
        return $listingImage->listing_id === $listing->id && $listing->user_id === $user->id;
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ListingImage $listingImage): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ListingImage $listingImage): bool
    {
        return false;
    }
}
