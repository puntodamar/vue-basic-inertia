<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

    public function index()
    {
        return inertia("Listing/Index", ["listings" => Listing::with('owner')->orderByDesc('created_at')->get()]);
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
        return inertia("Listing/Edit", ["listing" => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingRequest $request, Listing $listing)
    {
        $listing->update($request->validated());
        return redirect()->route('listings.edit', ['listing' => $listing])->with('success', 'Listing updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if ($listing->owner_id === Auth::id()) {
            $listing->delete();
            return to_route('listings.index')->with('success', 'Data Deleted');
        } else {
            return to_route('listings.index')->with('error', '401 Unauthorized');
        }

    }
}
