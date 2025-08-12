<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingImagesRequest;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing) {
        return inertia('Realtor/ListingImage/Create', [
            'listing' => $listing->loadCount('images'),
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
}
