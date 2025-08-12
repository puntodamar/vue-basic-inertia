<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ListingController extends Controller
{

    public function index(Request $request)
    {
        
        $allowed = ['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'];
        $listings = Listing::with('owner:id,name')
            ->latest()
            ->filter($request->only($allowed))
            ->paginate(5)
            ->withQueryString();



        return inertia("Listing/Index", [
            "listings" => $listings,
            "filters" => $request->only($allowed),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Listing/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingRequest $request)
    {
        $listing = Listing::create(
            $request->safe()->merge(['owner_id' => Auth::id()])->all()
        );

//        $listing = $request->user()->listings()->create($request->validated());

        return to_route('listings.show', ['listing' => $listing])->with('success', 'Listing created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {

        return inertia("Listing/Show", ["listing" => $listing]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        $response = Gate::inspect('update', $listing);

        if ($response->allowed()) {
            return inertia("Listing/Edit", ["listing" => $listing]);
        } else {
            return redirect()->route('my-listings')->with('error', $response->message());
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ListingRequest $request, Listing $listing)
    {
        $response = Gate::inspect('update', $listing);

        if ($response->allowed()) {
            $listing->update($request->validated());
            return redirect()->route('listings.edit', ['listing' => $listing])->with('success', 'Listing updated');
        } else {
            return redirect()->route('my-listings')->with('error', $response->message());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $response = Gate::inspect('update', $listing);

        if ($response->allowed()) {
            $listing->deleteOrFail();
            return to_route('realtors.listings.index')->with('success', 'Listing has been deleted successfully');
        } else {
            return to_route('listings.index')->with('error', $response->message());
        }

    }

}
