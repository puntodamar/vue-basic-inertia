<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RealtorListingOfferController extends Controller {

    public function store(Listing $listing, Request $request) {
        $listing->offers()->save(
            Offer::make($request->validate([
                    'amount' => 'required|integer|min:1'
                ]))->bidder()->associate(Auth::user())
        );
//
//        $validate = $request->validate(['amount' => 'required|integer|min:1'];
//
//        Offer::create([
//            'amount' => $validate['amount'],
//            'user_id' => Auth::id(),
//            'listing_id' => $listing->getKey()
//        ]);

        return redirect()->back()->with('success', 'Offer was made successfully!');
    }
}
