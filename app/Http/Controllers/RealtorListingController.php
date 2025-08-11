<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RealtorListingController extends Controller
{
    public function index(Request $request) {

        $filters = [
            'deleted' => $request->boolean('deleted'),
            'draft' => $request->boolean('draft'),
        ];

        return inertia("Realtor/Index", [
            'listings' => Auth::user()->listings()->filter($filters)->paginate(5)->withQueryString(),
        ]);
    }

    public function restore(Listing $listing)
    {

        $response = Gate::inspect('restore', $listing);

        if ($response->allowed()) {
            $listing->restore();
            return redirect()->back()->with("success", "Listing restored successfully.");
        } else {
            return redirect()->route('my-listings')->with('error', $response->message());
        }
    }
}
