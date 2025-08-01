<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia("Listing/Index", ["listings" => Listing::all()]);
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
        Listing::create($request->validated());
        return to_route('listings.index')->with('success', 'flash with to_route');
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
    public function update(ListingRequest $request, Listing $listing): \Illuminate\Http\RedirectResponse
    {
        $listing->update($request->validated());
        return to_route('listings.show', ['listing' => $listing])->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return to_route('listings.index')->with('success', 'Data Deleted');
    }
}
