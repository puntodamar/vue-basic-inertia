<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingImagesRequest;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing) {
        return inertia('Realtor/ListingImage/Create', [
            'listing' => $listing->load('images'),
        ]);
    }

    public function store(Listing $listing, StoreListingImagesRequest $request) {
        $request->validated();

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images/listings', $filename, 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $filename,
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    public function destroy(Listing $listing, ListingImage $image) {

        $response = Gate::inspect('delete', $listing, $image);

        if ($response->allowed()) {
            DB::transaction(function () use ($image) {
                // Delete the physical file
                Storage::disk('public')->delete('images/listings/' . $image->filename);

                // Delete the DB record
                $image->delete();

            });

            return back()->with('success', 'Image deleted successfully.');
        } else {
            return back()->with('error', 'You do not have permission to delete this image.');
        }



    }
}
